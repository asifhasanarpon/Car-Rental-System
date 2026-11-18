const http = require('http');
const fs = require('fs');
const path = require('path');

const PORT = process.env.PORT || 8000;
const DB_FILE = path.join(__dirname, 'database.json');

function loadDB() {
  if (!fs.existsSync(DB_FILE)) {
    const initial = { users: [], bookings: [] };
    fs.writeFileSync(DB_FILE, JSON.stringify(initial, null, 2));
    return initial;
  }
  try {
    return JSON.parse(fs.readFileSync(DB_FILE, 'utf8'));
  } catch (e) {
    return { users: [], bookings: [] };
  }
}

function saveDB(data) {
  fs.writeFileSync(DB_FILE, JSON.stringify(data, null, 2));
}

function parseBody(req) {
  return new Promise((resolve) => {
    let body = '';
    req.on('data', chunk => { body += chunk; });
    req.on('end', () => {
      try {
        resolve(JSON.parse(body || '{}'));
      } catch (e) {
        resolve({});
      }
    });
  });
}

const server = http.createServer(async (req, res) => {
  const url = req.url.split('?')[0];

  if (req.method === 'GET' && (url.startsWith('/assets/') || /\.(jpg|jpeg|png|webp|css|js|svg)$/i.test(url))) {
    const filePath = path.join(__dirname, url.replace(/^\//, ''));
    if (fs.existsSync(filePath)) {
      const ext = path.extname(filePath).toLowerCase();
      const mimeTypes = {
        '.jpg': 'image/jpeg',
        '.jpeg': 'image/jpeg',
        '.png': 'image/png',
        '.webp': 'image/webp',
        '.svg': 'image/svg+xml',
        '.css': 'text/css',
        '.js': 'application/javascript'
      };
      res.writeHead(200, { 'Content-Type': mimeTypes[ext] || 'application/octet-stream' });
      return res.end(fs.readFileSync(filePath));
    }
  }


  if (req.method === 'GET' && (url === '/' || url === '/index.html')) {
    const htmlPath = path.join(__dirname, 'index.html');
    const content = fs.readFileSync(htmlPath, 'utf8');
    res.writeHead(200, { 'Content-Type': 'text/html; charset=utf-8' });
    return res.end(content);
  }

  if (req.method === 'POST' && url === '/register') {
    const body = await parseBody(req);
    const db = loadDB();
    if (!body.email || !body.password) {
      res.writeHead(422, { 'Content-Type': 'application/json' });
      return res.end(JSON.stringify({ status: 'error', message: 'Email and password are required.' }));
    }
    const existing = db.users.find(u => u.email === body.email);
    if (existing) {
      res.writeHead(422, { 'Content-Type': 'application/json' });
      return res.end(JSON.stringify({ status: 'error', message: 'Email is already registered.' }));
    }
    const user = {
      id: db.users.length + 1,
      name: body.name || body.email.split('@')[0],
      email: body.email,
      phone: body.phone || '',
      password: body.password,
      created_at: new Date().toISOString()
    };
    db.users.push(user);
    saveDB(db);
    res.writeHead(200, { 'Content-Type': 'application/json' });
    return res.end(JSON.stringify({ status: 'success', message: 'Registration Successful!', user }));
  }

  if (req.method === 'POST' && url === '/login') {
    const body = await parseBody(req);
    const db = loadDB();
    let user = db.users.find(u => u.email === body.email);
    if (!user) {
      user = {
        id: db.users.length + 1,
        name: body.name || (body.email ? body.email.split('@')[0] : 'User'),
        email: body.email,
        phone: body.phone || '',
        password: body.password || '',
        created_at: new Date().toISOString()
      };
      db.users.push(user);
      saveDB(db);
    } else if (user.password && body.password && user.password !== body.password) {
      res.writeHead(422, { 'Content-Type': 'application/json' });
      return res.end(JSON.stringify({ status: 'error', message: 'Invalid email or password.' }));
    }
    res.writeHead(200, { 'Content-Type': 'application/json' });
    return res.end(JSON.stringify({ status: 'success', message: 'Login Successful!', user }));
  }

  if (req.method === 'POST' && url === '/logout') {
    res.writeHead(200, { 'Content-Type': 'application/json' });
    return res.end(JSON.stringify({ status: 'success', message: 'Logged out.' }));
  }

  if (req.method === 'POST' && url === '/bookings') {
    const body = await parseBody(req);
    const db = loadDB();
    const booking = {
      id: db.bookings.length + 1,
      car_name: body.car_name,
      pickup_location: body.pickup_location,
      start_time: body.start_time,
      return_time: body.return_time,
      email: body.email || 'Not provided',
      phone: body.phone || 'Not provided',
      driver_phone: '+880 1712-345678',
      status: 'confirmed',
      created_at: new Date().toISOString()
    };
    db.bookings.unshift(booking);
    saveDB(db);
    res.writeHead(200, { 'Content-Type': 'application/json' });
    return res.end(JSON.stringify({ status: 'success', message: 'Rent Hour Successful!', booking }));
  }

  if (req.method === 'GET' && url === '/bookings') {
    const db = loadDB();
    res.writeHead(200, { 'Content-Type': 'application/json' });
    return res.end(JSON.stringify({ status: 'success', bookings: db.bookings }));
  }

  res.writeHead(404, { 'Content-Type': 'application/json' });
  res.end(JSON.stringify({ status: 'error', message: 'Not found' }));
});

server.listen(PORT, '127.0.0.1', () => {
  console.log(`\n======================================================`);
  console.log(`  Car Rental System Server is running!`);
  console.log(`  Open in browser: http://127.0.0.1:${PORT}`);
  console.log(`======================================================\n`);
});
