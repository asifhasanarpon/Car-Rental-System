const fs = require('fs');
const path = require('path');

const DB_FILE = process.env.VERCEL ? path.join('/tmp', 'database.json') : path.join(__dirname, '..', 'database.json');

function loadDB() {
  if (!fs.existsSync(DB_FILE)) {
    const initial = {
      users: [],
      bookings: [
        {
          id: 1,
          ref_code: 'CR-2026-89421',
          car_name: 'Tesla Model S',
          pickup_location: "Hazrat Shahjalal Int'l Airport (DAC), Dhaka",
          return_location: "Hazrat Shahjalal Int'l Airport (DAC), Dhaka",
          start_time: '2026-11-20T10:00',
          return_time: '2026-11-23T10:00',
          name: 'Asif Hasan',
          email: 'asifhasanarpon21@gmail.com',
          phone: '+880 1618-956088',
          total_amount: 567,
          driver_phone: '+880 1712-345678',
          status: 'confirmed',
          created_at: new Date().toISOString()
        }
      ]
    };
    try {
      fs.writeFileSync(DB_FILE, JSON.stringify(initial, null, 2));
      return initial;
    } catch (e) {
      return initial;
    }
  }
  try {
    return JSON.parse(fs.readFileSync(DB_FILE, 'utf8'));
  } catch (e) {
    return { users: [], bookings: [] };
  }
}

function saveDB(data) {
  try {
    fs.writeFileSync(DB_FILE, JSON.stringify(data, null, 2));
  } catch (e) {}
}

module.exports = async (req, res) => {
  // Enable CORS
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, DELETE, OPTIONS');
  res.setHeader('Access-Control-Allow-Headers', 'Content-Type, X-CSRF-TOKEN, Accept');

  if (req.method === 'OPTIONS') {
    res.status(200).end();
    return;
  }

  const url = (req.url || '').split('?')[0];

  // Parse Body if needed
  let body = req.body || {};
  if (typeof body === 'string') {
    try { body = JSON.parse(body); } catch (e) { body = {}; }
  }

  // Bookings API
  if (url.includes('/bookings')) {
    const db = loadDB();

    if (req.method === 'GET') {
      res.setHeader('Content-Type', 'application/json');
      return res.status(200).json({ status: 'success', bookings: db.bookings });
    }

    if (req.method === 'POST') {
      const refCode = body.ref_code || 'CR-' + new Date().getFullYear() + '-' + Math.floor(10000 + Math.random() * 90000);
      const newBooking = {
        id: db.bookings.length + 1,
        ref_code: refCode,
        car_name: body.car_name || 'Executive Vehicle',
        pickup_location: body.pickup_location || "Hazrat Shahjalal Int'l Airport (DAC), Dhaka",
        return_location: body.return_location || body.pickup_location || "Hazrat Shahjalal Int'l Airport (DAC), Dhaka",
        start_time: body.start_time || new Date().toISOString(),
        return_time: body.return_time || new Date(Date.now() + 3 * 86400000).toISOString(),
        name: body.name || 'Valued Customer',
        email: body.email || 'customer@carrental.bd',
        phone: body.phone || '+880 1618-956088',
        total_amount: body.total || 567,
        driver_phone: '+880 1712-345678',
        status: 'confirmed',
        created_at: new Date().toISOString()
      };
      db.bookings.unshift(newBooking);
      saveDB(db);
      res.setHeader('Content-Type', 'application/json');
      return res.status(200).json({ status: 'success', message: 'Reservation Confirmed!', booking: newBooking });
    }

    if (req.method === 'DELETE') {
      const idMatch = url.match(/\/bookings\/([^/]+)/);
      const bookingId = idMatch ? idMatch[1] : null;
      if (bookingId) {
        const target = db.bookings.find(b => String(b.id) === String(bookingId) || b.ref_code === bookingId);
        if (target) {
          target.status = 'cancelled';
          saveDB(db);
          res.setHeader('Content-Type', 'application/json');
          return res.status(200).json({ status: 'success', message: 'Booking Cancelled', booking: target });
        }
      }
      res.setHeader('Content-Type', 'application/json');
      return res.status(200).json({ status: 'success', message: 'Booking Cancelled' });
    }
  }

  // Auth: Login
  if (url.includes('/login') && req.method === 'POST') {
    const db = loadDB();
    let user = db.users.find(u => u.email === body.email);
    if (!user) {
      user = {
        id: db.users.length + 1,
        name: body.name || (body.email ? body.email.split('@')[0] : 'User'),
        email: body.email,
        phone: body.phone || '+880 1618-956088',
        created_at: new Date().toISOString()
      };
      db.users.push(user);
      saveDB(db);
    }
    res.setHeader('Content-Type', 'application/json');
    return res.status(200).json({ status: 'success', message: 'Login Successful!', user });
  }

  // Auth: Register
  if (url.includes('/register') && req.method === 'POST') {
    const db = loadDB();
    const user = {
      id: db.users.length + 1,
      name: body.name || (body.email ? body.email.split('@')[0] : 'User'),
      email: body.email,
      phone: body.phone || '+880 1618-956088',
      created_at: new Date().toISOString()
    };
    db.users.push(user);
    saveDB(db);
    res.setHeader('Content-Type', 'application/json');
    return res.status(200).json({ status: 'success', message: 'Registration Successful!', user });
  }

  // Auth: Logout
  if (url.includes('/logout') && req.method === 'POST') {
    res.setHeader('Content-Type', 'application/json');
    return res.status(200).json({ status: 'success', message: 'Logged out.' });
  }

  res.setHeader('Content-Type', 'application/json');
  return res.status(200).json({ status: 'ok', service: 'Car Rental BD Vercel Serverless API' });
};
