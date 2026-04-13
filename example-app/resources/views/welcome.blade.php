<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <title>Web Design Mastery | Car Rental</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

      :root {
        --primary-color: #3518d4;
        --primary-color-dark: #2e2a40;
        --text-dark: #221e36;
        --text-light: #767268;
        --extra-light: #f1f2ff;
        --white: #ffffff;
        --max-width: 1200px;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: "Roboto", sans-serif;
      }

      html, body {
        scroll-behavior: smooth;
      }


      body.locked-screen {
        overflow: hidden;
        height: 100vh;
      }

      #auth-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(46, 42, 64, 0.95), rgba(53, 24, 212, 0.95));
        backdrop-filter: blur(10px);
        z-index: 100000;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.6s ease, visibility 0.6s ease;
      }

      .auth-box {
        background-color: var(--white);
        padding: 2.5rem;
        border-radius: 1rem;
        width: 90%;
        max-width: 450px;
        box-shadow: 0px 15px 35px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.5s ease;
      }

      @keyframes slideUp {
        from { transform: translateY(30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
      }

      .auth-box h2 {
        text-align: center;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
      }

      .auth-tabs {
        display: flex;
        margin-bottom: 2rem;
        border-bottom: 2px solid #eee;
      }

      .auth-tab {
        flex: 1;
        text-align: center;
        padding: 10px;
        cursor: pointer;
        font-weight: 600;
        color: var(--text-light);
        transition: 0.3s;
      }

      .auth-tab.active {
        color: var(--primary-color);
        border-bottom: 2px solid var(--primary-color);
      }

      .auth-box .input__group {
        margin-bottom: 1.2rem;
        display: flex;
        flex-direction: column;
        gap: 8px;
      }

      .auth-box input {
        padding: 14px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        outline: none;
        transition: 0.3s;
        width: 100%;
      }

      .auth-box input:focus {
        border-color: var(--primary-color);
      }

      .section__container {
        max-width: var(--max-width);
        margin: auto;
        padding: 5rem 1rem;
      }

      .section__header {
        margin-bottom: 1rem;
        font-size: 2.5rem;
        font-weight: 600;
        color: var(--text-dark);
        line-height: 3.25rem;
        text-align: center;
      }

      .section__description {
        color: var(--text-light);
        text-align: center;
        line-height: 1.5rem;
      }

      .btn {
        padding: 0.75rem 1.5rem;
        outline: none;
        border: none;
        font-size: 1rem;
        color: var(--white);
        background-color: var(--primary-color);
        border-radius: 0.5rem;
        transition: 0.3s;
        cursor: pointer;
      }

      .btn:hover {
        background-color: var(--primary-color-dark);
      }

      .logo {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      .logo img {
        max-width: 35px;
      }

      .logo span {
        font-size: 1.25rem;
        font-weight: 700;
        font-style: italic;
        color: var(--white);
        white-space: nowrap;
      }

      img {
        display: flex;
        width: 100%;
        border-radius: 0.5rem;
      }

      a {
        text-decoration: none;
        transition: 0.3s;
      }

      ul {
        list-style: none;
      }

      header {
        background: linear-gradient(
          to bottom,
          rgba(138, 121, 240, 0),
          rgba(138, 121, 240, 0.1)
        );
      }

      nav {
        position: fixed;
        isolation: isolate;
        width: 100%;
        z-index: 9;
      }

      .nav__header {
        padding: 0.75rem 1rem;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: var(--primary-color-dark);
      }

      .nav__logo .logo-dark {
        display: none;
      }

      .nav__menu__btn {
        font-size: 1.5rem;
        color: var(--white);
        cursor: pointer;
      }

      .nav__links {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 2rem;
        padding: 2rem;
        background-color: var(--primary-color-dark);
        transition: transform 0.5s;
        z-index: -1;
      }

      .nav__links.open {
        transform: translateY(100%);
      }

      .nav__links a {
        color: var(--white);
      }

      .nav__links a:hover {
        color: var(--primary-color);
      }

      .nav__btns {
        display: none;
      }

      .header__container {
        padding-top: 5rem;
        display: grid;
      }

      .header__image {
        position: relative;
        isolation: isolate;
        overflow: hidden;
      }

      .header__image::before {
        position: absolute;
        content: "";
        height: 100%;
        width: 100%;
        top: 0;
        left: 5rem;
        background-color: var(--primary-color);
        opacity: 0.2;
        border-top-left-radius: 2rem;
        z-index: -1;
      }

      .header__content {
        padding-block: 2rem 5rem;
        padding-inline: 1rem;
      }

      .header__content h2 {
        width: fit-content;
        margin-inline: auto;
        margin-bottom: 1rem;
        padding: 0.5rem 1.5rem;
        font-size: 1rem;
        font-weight: 500;
        color: var(--primary-color);
        background-color: var(--white);
        border-radius: 5rem;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.05);
      }

      .header__content h1 {
        margin-bottom: 2rem;
        font-size: 3.5rem;
        font-weight: 800;
        color: var(--text-dark);
        text-align: center;
      }

      .header__form form {
        max-width: 900px;
        margin-inline: auto;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 1rem;
        background-color: var(--white);
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        border-radius: 1rem;
      }

      .header__form .input__group {
        flex: 1 0 170px;
        display: grid;
        gap: 10px;
      }

      .header__form label {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--text-dark);
      }

      .header__form input {
        width: 100%;
        outline: none;
        border: none;
        font-size: 1rem;
        color: var(--text-light);
      }

      .header__form input::placeholder {
        color: var(--text-light);
      }

      .header__form .btn {
        padding: 15px 17px;
      }

      .about__container .section__description {
        max-width: 600px;
        margin-inline: auto;
        margin-bottom: 4rem;
      }

      .about__grid {
        display: grid;
        gap: 2rem 1rem;
      }

      .about__card {
        max-width: 300px;
        margin-inline: auto;
        text-align: center;
      }

      .about__card span {
        display: inline-block;
        margin-bottom: 2rem;
        font-size: 2.5rem;
        padding: 16px 20px;
        border-radius: 1.25rem;
        box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.05);
      }

      .about__card:nth-child(1) span {
        color: #8a79f0;
        background-color: #eeebfd;
      }

      .about__card:nth-child(2) span {
        color: #fba55b;
        background-color: #fff2e8;
      }

      .about__card:nth-child(3) span {
        color: #ee6a6f;
        background-color: #fde9ea;
      }

      .about__card h4 {
        margin-bottom: 10px;
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-dark);
      }

      .about__card p {
        color: var(--text-light);
        line-height: 1.5rem;
      }

      .deals {
        background-color: var(--extra-light);
      }

      .deals__container .section__description {
        max-width: 600px;
        margin-inline: auto;
        margin-bottom: 4rem;
      }

      .deals__tabs {
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
      }

      .deals__tabs .btn {
        font-weight: 600;
        color: var(--primary-color-dark);
        background-color: var(--white);
      }

      .deals__tabs .btn.active {
        color: var(--white);
        background-color: var(--primary-color);
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      }

      .deals__container .tab__content {
        display: none;
        gap: 1rem;
        animation: fadeEffect 1s;
      }

      .deals__container .tab__content.active {
        display: grid;
      }

      @keyframes fadeEffect {
        from { opacity: 0; }
        to { opacity: 1; }
      }

      .deals__card {
        padding: 1rem;
        background-color: var(--white);
        border-radius: 1rem;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      }

      .deals__card img {
        margin-bottom: 1rem;
        height: 200px;
        object-fit: cover;
      }

      .deals__rating {
        margin-bottom: 1rem;
        color: goldenrod;
      }

      .deals__rating span:last-child {
        color: var(--text-light);
      }

      .deals__card h4 {
        margin-bottom: 1rem;
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-dark);
      }

      .deals__card__grid {
        margin-bottom: 2rem;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
      }

      .deals__card__grid div {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--text-light);
      }

      .deals__card__grid div span {
        font-size: 1.2rem;
      }

      .deals__card__footer {
        margin-top: 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
      }

      .deals__card__footer h3 {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--text-dark);
      }

      .deals__card__footer h3 span {
        font-size: 0.9rem;
        font-weight: 400;
        color: var(--text-light);
      }

      .deals__card__footer a {
        font-weight: 600;
        color: var(--primary-color);
        cursor: pointer;
      }

      .deals__card__footer a:hover {
        color: var(--primary-color-dark);
      }

      .choose__container {
        display: grid;
      }

      .choose__content {
        padding-block: 2rem 5rem;
        padding-inline: 1rem;
      }

      .choose__grid {
        margin-top: 3rem;
        display: grid;
        gap: 2rem 1rem;
      }

      .choose__card {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
      }

      .choose__card span {
        padding: 5px 7px;
        font-size: 1.5rem;
        background-color: var(--extra-light);
        color: var(--primary-color);
        border-radius: 0.5rem;
      }

      .choose__card h4 {
        margin-bottom: 5px;
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--text-dark);
      }

      .choose__card p {
        font-size: 0.9rem;
        color: var(--text-light);
        line-height: 1.5rem;
      }

      .subscribe__container {
        position: relative;
        isolation: isolate;
        display: grid;
        overflow: hidden;
        background-color: var(--extra-light);
      }

      .subscribe__container::before,
      .subscribe__container::after {
        position: absolute;
        content: "";
        width: 100%;
        height: 3rem;
        top: 0;
        left: 0;
        background-color: var(--white);
        z-index: -1;
      }

      .subscribe__container::after {
        top: unset;
        bottom: 0;
      }

      .subscribe__content {
        padding-block: 2rem 8rem;
        padding-inline: 1rem;
      }

      .subscribe__content form {
        margin-top: 2rem;
        margin-inline: auto;
        width: 100%;
        max-width: 500px;
        display: flex;
        align-items: center;
        background-color: var(--white);
        border-radius: 5px;
      }

      .subscribe__content input {
        width: 100%;
        outline: none;
        border: none;
        font-size: 1rem;
        color: var(--text-dark);
        padding-inline: 1rem;
        background-color: transparent;
      }

      .subscribe__content .btn {
        padding-block: 1rem;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
      }

      .client__container {
        padding-bottom: 1rem;
      }

      .client__container .section__description {
        max-width: 600px;
        margin-inline: auto;
      }

      .swiper {
        padding-block: 4rem;
        width: 100%;
      }

      .swiper-slide {
        min-width: 375px;
      }

      .client__card {
        padding: 1.5rem;
        background-color: var(--white);
        border-radius: 1rem;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.05);
        transition: 0.3s;
      }

      .client__card:hover {
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      }

      .client__details {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
      }

      .client__details img {
        max-width: 50px;
        border-radius: 100%;
      }

      .client__details h4 {
        margin-bottom: 5px;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-dark);
      }

      .client__rating {
        color: goldenrod;
      }

      .client__card p {
        color: var(--text-light);
        line-height: 1.5rem;
      }

      .footer {
        background-color: var(--primary-color-dark);
      }

      .footer__container {
        display: grid;
        gap: 4rem 2rem;
      }

      .footer__logo {
        margin-bottom: 2rem;
      }

      .footer__logo img {
        max-width: 45px;
      }

      .footer__logo span {
        font-size: 1.5rem;
        color: var(--white);
      }

      .footer__col p {
        margin-bottom: 2rem;
        color: var(--extra-light);
        line-height: 1.5rem;
      }

      .footer__socials {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
      }

      .footer__socials a {
        padding: 6px 8px;
        font-size: 1.125rem;
        color: var(--text-dark);
        background-color: var(--white);
        border-radius: 100%;
      }

      .footer__socials a:hover {
        color: var(--white);
        background-color: var(--primary-color);
      }

      .footer__col h4 {
        margin-bottom: 2rem;
        font-size: 1.2rem;
        font-weight: 500;
        color: var(--white);
      }

      .footer__links {
        display: grid;
        gap: 1rem;
      }

      .footer__links a {
        color: var(--extra-light);
      }

      .footer__links a:hover {
        color: var(--primary-color);
      }

      .footer__links span {
        display: inline-block;
        margin-right: 10px;
        padding: 4px 6px;
        border: 1px solid var(--extra-light);
        border-radius: 100%;
      }

      .footer__links a:hover span {
        border-color: var(--primary-color);
      }

      @media (width > 540px) {
        .about__grid { grid-template-columns: repeat(2, 1fr); }
        .deals__container .tab__content { grid-template-columns: repeat(2, 1fr); }
        .choose__grid { grid-template-columns: repeat(2, 1fr); }
        .footer__container { grid-template-columns: repeat(2, 1fr); }
      }

      @media (width > 768px) {
        nav {
          position: static;
          padding: 1.5rem 1rem;
          max-width: var(--max-width);
          margin-inline: auto;
          margin-bottom: 5rem;
          display: flex;
          align-items: center;
          justify-content: space-between;
          gap: 1rem;
        }

        .nav__header {
          flex: 1;
          padding: 0;
          background-color: transparent;
        }

        .nav__logo img { max-width: 45px; }
        .nav__logo .logo-dark { display: flex; }
        .nav__logo .logo-white { display: none; }
        .nav__logo span {
          font-size: 1.5rem;
          color: var(--primary-color-dark);
        }

        .nav__menu__btn { display: none; }

        .nav__links {
          position: static;
          width: fit-content;
          padding: 0;
          flex-direction: row;
          background-color: transparent;
          transform: none !important;
        }

        .nav__links a {
          font-weight: 500;
          color: var(--text-dark);
        }

        .nav__links li:last-child {
          display: none;
        }

        .nav__btns {
          flex: 1;
          display: flex;
          justify-content: flex-end;
        }

        .header__container {
          padding-top: 0;
          grid-template-columns:
            minmax(0, 1fr)
            minmax(0, calc(var(--max-width) / 2))
            minmax(0, calc(var(--max-width) / 2))
            minmax(0, 1fr);
        }

        .header__image {
          grid-area: 1/3/2/5;
          height: 100%;
        }

        .header__image img {
          padding-bottom: 5rem;
          position: absolute;
          top: 50%;
          left: 0;
          transform: translateY(-50%);
          width: unset;
          height: 100%;
        }

        .header__content {
          padding-block: 2rem 10rem;
          grid-area: 1/2/2/3;
        }

        .header__content h2 { margin-inline-start: unset; }
        .header__content :is(h1, .section__description) { text-align: left; }

        .header__form form {
          padding: 1.5rem;
          transform: translateY(-50%);
        }

        .about__container { padding-top: 3rem; }
        .about__grid { grid-template-columns: repeat(3, 1fr); }
        .deals__container .tab__content { grid-template-columns: repeat(3, 1fr); }

        .choose__container {
          grid-template-columns:
            minmax(0, 1fr)
            minmax(0, calc(var(--max-width) / 2))
            minmax(0, calc(var(--max-width) / 2))
            minmax(0, 1fr);
        }

        .choose__image {
          position: relative;
          isolation: isolate;
          grid-area: 1/1/2/3;
          height: 100%;
        }

        .choose__image img {
          position: absolute;
          top: 50%;
          right: 0;
          transform: translateY(-50%);
          width: unset;
          height: 100%;
        }

        .choose__content {
          padding-block: 5rem;
          grid-area: 1/3/2/4;
        }

        .choose__content :is(.section__header, .section__description) { text-align: left; }

        .subscribe__container {
          grid-template-columns:
            minmax(0, 1fr)
            minmax(0, calc(var(--max-width) / 2))
            minmax(0, calc(var(--max-width) / 2))
            minmax(0, 1fr);
        }

        .subscribe__image {
          position: relative;
          isolation: isolate;
          grid-area: 1/3/2/5;
          height: 100%;
        }

        .subscribe__image img {
          position: absolute;
          top: 50%;
          left: 0;
          transform: translateY(-50%);
          width: unset;
          height: 100%;
        }

        .subscribe__content {
          padding-block: 8rem;
          grid-area: 1/2/2/3;
        }

        .subscribe__content :is(.section__header, .section__description) { text-align: left; }
        .subscribe__content form { margin-inline-start: unset; }
        .footer__container { grid-template-columns: repeat(4, 1fr); }
      }

      @media (width > 1024px) {
        .deals__container .tab__content { gap: 1.5rem; }
        .deals__card { padding: 1.5rem; }
      }

      .success-message {
        display: none;
        text-align: center;
        padding: 1rem 0;
        animation: fadeIn 0.5s ease;
      }

      .success-message i { font-size: 4rem; color: #28a745; }
      .success-message h3 { margin-top: 1rem; color: var(--text-dark); font-size: 1.5rem; }
      .success-message p { margin-top: 0.5rem; color: var(--text-light); }

      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }

      .ri-spin {
        animation: spin 1s linear infinite;
        display: inline-block;
      }

      @keyframes spin { 100% { transform: rotate(360deg); } }

      #toast-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        z-index: 9999;
      }

      .toast {
        background-color: var(--white);
        color: var(--text-dark);
        padding: 16px 24px;
        border-radius: 8px;
        box-shadow: 0px 5px 25px rgba(0, 0, 0, 0.15);
        font-size: 1rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 12px;
        border-left: 5px solid var(--primary-color);
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      }

      .toast i { font-size: 1.5rem; color: var(--primary-color); }
      .toast.success { border-left-color: #28a745; }
      .toast.success i { color: #28a745; }
      
      /* Error Toast Styles */
      .toast.error { border-left-color: #dc3545; }
      .toast.error i { color: #dc3545; }

      .toast.show { opacity: 1; transform: translateX(0); }

      .profile-container {
        position: relative;
        display: inline-block;
        cursor: pointer;
      }

      .profile-icon {
        background-color: var(--primary-color);
        color: var(--white);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: 0.3s;
      }

      .profile-icon i {
        font-size: 1.4rem;
      }

      .profile-icon:hover { background-color: var(--primary-color-dark); }

      .profile-dropdown {
        display: none;
        position: absolute;
        top: 50px;
        right: 0;
        background-color: var(--white);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        border-radius: 8px;
        min-width: 220px;
        overflow: hidden;
        z-index: 1000;
        flex-direction: column;
        cursor: default;
      }

      .profile-dropdown.show {
        display: flex;
        animation: fadeIn 0.2s ease-in-out;
      }

      .profile-info { 
        padding: 16px; 
        border-bottom: 1px solid #eee; 
      }
      .profile-info strong { 
        display: block; 
        color: var(--text-dark); 
        font-size: 1.05rem; 
        margin-bottom: 8px; 
      }
      
      /* Style for the new stacked email and phone items */
      .profile-info .info-item { 
        display: flex; 
        align-items: center; 
        gap: 6px; 
        color: var(--text-light); 
        font-size: 0.85rem; 
        word-break: break-all; 
        margin-bottom: 4px;
      }
      .profile-info .info-item i {
        font-size: 1rem;
        color: var(--primary-color);
      }

      .logout-btn {
        padding: 12px 16px;
        color: #dc3545;
        text-align: left;
        background: none;
        border: none;
        width: 100%;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 500;
        transition: background 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
      }

      .logout-btn:hover { background-color: #fff5f5; }
    </style>
  </head>
  <body class="locked-screen">
    
    <div id="auth-overlay">
      <div class="auth-box">
        <h2 id="auth-title">Welcome to Car Rental</h2>
        <div class="auth-tabs">
          <div class="auth-tab active" id="tab-login">Login</div>
          <div class="auth-tab" id="tab-register">Register</div>
        </div>
        
        <form id="auth-form" method="POST" action="#">
          <div class="input__group" id="name-group" style="display: none;">
            <input type="text" id="auth-name" placeholder="Full Name" />
          </div>
          <div class="input__group" id="email-group">
            <input type="email" id="auth-email" required placeholder="Email Address" />
          </div>
          <div class="input__group" id="phone-group">
            <input type="tel" id="auth-phone" required placeholder="Phone Number" />
          </div>
          <div class="input__group" id="password-group">
            <input type="password" id="auth-password" required placeholder="Password" />
          </div>
          <button type="submit" class="btn" id="auth-btn" style="width: 100%; margin-top: 1rem;">Login</button>
        </form>
        
        <div id="auth-success" class="success-message">
          <i class="ri-checkbox-circle-fill"></i>
          <h3 id="auth-success-msg">Login Successful!</h3>
          <p>Redirecting to website...</p>
        </div>
      </div>
    </div>

    <header>
      <nav>
        <div class="nav__header">
          <div class="nav__logo">
            <a href="#home" class="logo">
              <img src="https://cdn.vectorstock.com/i/1000v/86/00/car-rental-logo-vector-25468600.jpg" alt="logo" class="logo-white" />
              <img src="https://cdn.vectorstock.com/i/1000v/86/00/car-rental-logo-vector-25468600.jpg" class="logo-dark" />
              <span>Car Rental</span>
            </a>
          </div>
          <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
          </div>
        </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#deals">Rental Deals</a></li>
          <li><a href="#choose">Why Choose Us</a></li>
          <li><a href="#client">Testimonials</a></li>
          <li></li>
        </ul>
        <div class="nav__btns">
          </div>
      </nav>
      <div class="header__container" id="home">
        <div class="header__image">
          <img src="https://www.pngplay.com/wp-content/uploads/13/Koenigsegg-Transparent-Free-PNG.png" alt="header" />
        </div>
        <div class="header__content">
          <h2>Trusted car rental platform in Bangladesh</h2>
          <h1>FAST AND EASY WAY TO RENT A CAR</h1>
          <p class="section__description">
            Discover a seamless car rental experience with us. Choose from a wide range of premium vehicles to match your style and needs. Quick, easy, and reliable—rent your ride today.
          </p>
        </div>
      </div>
    </header>
    <section class="header__form">
      <form id="search-form" method="POST" action="#">
        <div class="input__group">
          <label for="location">Pick up & Return location</label>
          <input type="text" name="location" id="location" placeholder="Dhaka, Bangladesh" required />
        </div>
        <div class="input__group">
          <label for="start">Pick up date & time</label>
          <input type="datetime-local" name="start" id="start" required />
        </div>
        <div class="input__group">
          <label for="stop">Return date & time</label>
          <input type="datetime-local" name="stop" id="stop" required />
        </div>
        <button type="submit" class="btn" id="search-btn">Search <i class="ri-search-line"></i></button>
      </form>
    </section>
    <section class="section__container about__container" id="about">
      <h2 class="section__header">How it work</h2>
      <p class="section__description">
        Renting a car with us is easy—choose your vehicle, select your dates, and book in minutes. We’ll take care of the rest for a smooth journey
      </p>
      <div class="about__grid">
        <div class="about__card">
          <span><i class="ri-map-pin-2-fill"></i></span>
          <h4>Choose Location</h4>
          <p>
            Select from a variety of pick-up locations that best suit your
            needs, whether it's close to home, work, or airport.
          </p>
        </div>
        <div class="about__card">
          <span><i class="ri-calendar-event-fill"></i></span>
          <h4>Pick-up Date</h4>
          <p>
            Select the exact date and time for your pick-up, and enjoy a perfectly timed, hassle-free start to your journey.
          </p>
        </div>
        <div class="about__card">
          <span><i class="ri-roadster-fill"></i></span>
          <h4>Book your Car</h4>
          <p>
            Complete your booking with just a few clicks, and we'll prepare your
            vehicle to ensure a hassle-free pick-up.
          </p>
        </div>
      </div>
    </section>
    <section class="deals" id="deals">
      <div class="section__container deals__container">
        <h2 class="section__header">Most popular car rental deals</h2>
        <p class="section__description">
          Explore our top car rental deals, handpicked to give you the best
          value and experience. Book now and drive your favorite ride at an
          incredible rate!
        </p>
        <div class="deals__tabs">
          <button class="btn active" data-id="Tesla">Tesla</button>
          <button class="btn" data-id="Mitsubishi">Mitsubishi</button>
          <button class="btn" data-id="Mazda">Mazda</button>
          <button class="btn" data-id="Toyota">Toyota</button>
          <button class="btn" data-id="Honda">Honda</button>
        </div>
        <div id="Tesla" class="tab__content active">
          <div class="deals__card">
            <img src="https://t3.ftcdn.net/jpg/04/91/22/94/360_F_491229401_k7y8Cbbw1zzsOBL2PURD2fM1R84fGoh8.jpg" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(550)</span>
            </div>
            <h4>Tesla Model S</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Autopilot</div>
              <div><span><i class="ri-speed-up-line"></i></span> 400km</div>
              <div><span><i class="ri-car-line"></i></span> Electric</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$180<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
          <div class="deals__card">
            <img src="https://file.aiquickdraw.com/imgcompressed/img/compressed_2ae437302256f66bec1c5ff1a12d46aa.webp" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(450)</span>
            </div>
            <h4>Tesla Model E</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Autopilot</div>
              <div><span><i class="ri-speed-up-line"></i></span> 400km</div>
              <div><span><i class="ri-car-line"></i></span> Electric</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$150<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
          <div class="deals__card">
            <img src="https://www.largus.fr/images/images/tesla-model-s-plaid-2021.jpg" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(550)</span>
            </div>
            <h4>Tesla Model Y</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Autopilot</div>
              <div><span><i class="ri-speed-up-line"></i></span> 400km</div>
              <div><span><i class="ri-car-line"></i></span> Electric</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$200<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
        </div>
        <div id="Mitsubishi" class="tab__content">
          <div class="deals__card">
            <img src="https://tse1.mm.bing.net/th/id/OIP.ZAdDA18es_CCgE51chzRdwHaHa?rs=1&pid=ImgDetMain&o=7&rm=3" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(350)</span>
            </div>
            <h4>Mirage</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$120<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
          <div class="deals__card">
            <img src="https://img.freepik.com/premium-photo/modern-white-sports-car-white-background_899449-393687.jpg?w=1380" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(250)</span>
            </div>
            <h4>Xpander</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$150<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
          <div class="deals__card">
            <img src="https://tse3.mm.bing.net/th/id/OIP.cPdgw_PxbhwyaMFhpvVNnQHaFj?rs=1&pid=ImgDetMain&o=7&rm=30" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(150)</span>
            </div>
            <h4>Pajero Sports</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$180<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
        </div>
        <div id="Mazda" class="tab__content">
          <div class="deals__card">
            <img src="https://img.freepik.com/premium-photo/white-sports-car-white-background_81048-308.jpg?w=900" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(200)</span>
            </div>
            <h4>Mazda CX5</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$130<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
          <div class="deals__card">
            <img src="https://s1.cdn.autoevolution.com/images/news/mazda-goes-bad-with-release-of-rx-vision-gt3-for-gran-turismo-sport-143977_1.jpg" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(100)</span>
            </div>
            <h4>Mazda CX-30</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$200<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
          <div class="deals__card">
            <img src="https://img.freepik.com/premium-photo/car-isolated-white-background-mazda-mx5-miata-convertible-white-car-blank-clean-white-black_655090-605238.jpg" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(180)</span>
            </div>
            <h4>Mazda CX-9</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$180<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
        </div>
        <div id="Toyota" class="tab__content">
          <div class="deals__card">
            <img src="https://tse2.mm.bing.net/th/id/OIP.Z2pLH6SMq5oOSJuSuLeRGwHaFu?rs=1&pid=ImgDetMain&o=7&rm=3" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(250)</span>
            </div>
            <h4>Corolla</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$180<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
          <div class="deals__card">
            <img src="https://tse2.mm.bing.net/th/id/OIF.NOLCe0rjZhg3WeVHRLK0bA?rs=1&pid=ImgDetMain&o=7&rm=3" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(550)</span>
            </div>
            <h4>Innova</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$150<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
          <div class="deals__card">
            <img src="https://tse3.mm.bing.net/th/id/OIF.GupVcTt0Jdhn2E1BUw37RQ?rs=1&pid=ImgDetMain&o=7&rm=3" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(180)</span>
            </div>
            <h4>Fortuner</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$190<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
        </div>
        <div id="Honda" class="tab__content">
          <div class="deals__card">
            <img src="https://tse4.mm.bing.net/th/id/OIP.icVBL2XHxw9F3LU_nBCq8gHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(200)</span>
            </div>
            <h4>Amaze</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$100<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
          <div class="deals__card">
            <img src="https://tse4.mm.bing.net/th/id/OIP.nPde0FZ4nwY2NDQB3oyhKgHaHa?rs=1&pid=ImgDetMain&o=7&rm=3" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(350)</span>
            </div>
            <h4>Elevate</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$120<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
          <div class="deals__card">
            <img src="https://tse4.mm.bing.net/th/id/OIP.T32RlFkD_6wEh_TZtfqYpQHaDG?rs=1&pid=ImgDetMain&o=7&rm=3" alt="deals" />
            <div class="deals__rating">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
              <span>(300)</span>
            </div>
            <h4>City</h4>
            <div class="deals__card__grid">
              <div><span><i class="ri-group-line"></i></span> 4 People</div>
              <div><span><i class="ri-steering-2-line"></i></span> Manual</div>
              <div><span><i class="ri-speed-up-line"></i></span> 18km/l</div>
              <div><span><i class="ri-car-line"></i></span> Diesel</div>
            </div>
            <hr />
            <div class="deals__card__footer">
              <h3>$150<span>/Per Day</span></h3>
              <a href="#">Rent Now <span><i class="ri-arrow-right-line"></i></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="choose__container" id="choose">
      <div class="choose__image">
        <img src="https://images5.alphacoders.com/100/1003630.jpg" alt="choose" />
      </div>
      <div class="choose__content">
        <h2 class="section__header">Why choose us</h2>
        <p class="section__description">
          Discover the difference with our car rental service. Enjoy reliable vehicles, excellent customer support, 
          and competitive pricing for a smooth rental experience.
        </p>
        <div class="choose__grid">
          <div class="choose__card">
            <span><i class="ri-customer-service-line"></i></span>
            <div>
              <h4>Customer Support</h4>
              <p>Our dedicated support team is available to assist you 24/7.</p>
            </div>
          </div>
          <div class="choose__card">
            <span><i class="ri-map-pin-line"></i></span>
            <div>
              <h4>Many Locations</h4>
              <p>Convenient pick-up and drop-off locations to suit your travel needs.</p>
            </div>
          </div>
          <div class="choose__card">
            <span><i class="ri-wallet-line"></i></span>
            <div>
              <h4>Best Price</h4>
              <p>Enjoy competitive rates and great value for every rental.</p>
            </div>
          </div>
          <div class="choose__card">
            <span><i class="ri-user-star-line"></i></span>
            <div>
              <h4>Experience Driver</h4>
              <p>Reliable, professional drivers available upon request.</p>
            </div>
          </div>
          <div class="choose__card">
            <span><i class="ri-verified-badge-line"></i></span>
            <div>
              <h4>Verified Brands</h4>
              <p>Choose from trusted and well-maintained car brands.</p>
            </div>
          </div>
          <div class="choose__card">
            <span><i class="ri-calendar-close-line"></i></span>
            <div>
              <h4>Free Cancellations</h4>
              <p>Flexible bookings with free cancellation options.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="subscribe__container">
      <div class="subscribe__image">
        <img src="https://4kwallpapers.com/images/wallpapers/koenigsegg-jesko-protonic-red-concept-cars-5k-3440x1440-866.jpeg" alt="subscribe" />
      </div>
      <div class="subscribe__content">
        <h2 class="section__header">Subscribe for the latest car rental updates</h2>
        <p class="section__description">
          Stay in the know! Subscribe to receive the latest car rental deals,
          exclusive offers, and updates right to your inbox. Don't miss out on
          special promotions and the newest additions to our fleet.
        </p>
        <form action="#" method="POST">
          <input type="email" name="email" placeholder="Your Email" required />
          <button type="submit" class="btn">Subscribe</button>
        </form>
      </div>
    </section>
    <section class="section__container client__container" id="client">
      <h2 class="section__header">What people say about us?</h2>
      <p class="section__description">
        Discover why our customers love renting with us! Read real reviews and
        testimonials to see how we deliver exceptional service.
      </p>
      <div class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="client__card">
              <div class="client__details">
                <img src="https://media.licdn.com/dms/image/v2/D5603AQF8U30FpPdelw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1705940242677?e=2147483647&v=beta&t=QW-gU9XQXrLipSfCJ03Hniq_qlfInFFnpreBSz6FMYI" alt="client" />
                <div>
                  <h4>Muminur Rahman Foysal</h4>
                  <div class="client__rating">
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-line"></i></span>
                  </div>
                </div>
              </div>
              <p>
                Smooth booking, shiny car, zero stress. Even my crush doesn’t respond this fast. Definitely renting again.
              </p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="client__card">
              <div class="client__details">
                <img src="https://scontent.fdac175-1.fna.fbcdn.net/v/t39.30808-6/486497475_3988471424812305_7775495171188038705_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=53a332&_nc_eui2=AeEpMld8hq9nUNRMBEKw5LSBvZDnSYDmhq29kOdJgOaGreJAyBBM22yxGCsJ-LkLmoZ4_xol_f5xYf3t4dcTXRLh&_nc_ohc=N47p-ItgOGcQ7kNvwGsaaOG&_nc_oc=Adqsh1otjcZP3wQ4bgb8z0CSDPCul2MYENhNBLPV3kOfKu5vliefpBr1oww1zDOZsy8&_nc_zt=23&_nc_ht=scontent.fdac175-1.fna&_nc_gid=g4dS9PFrVOzrWln00Z3TGQ&_nc_ss=7a3a8&oh=00_Af0ry6MNrVCMpNX7h8d_qe3HCZnCFhch4QRsT5u-GiynfQ&oe=69D68B25" alt="client" />
                <div>
                  <h4>Mahmudul Hasan Ifty</h4>
                  <div class="client__rating">
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-line"></i></span>
                  </div>
                </div>
              </div>
              <p>
                Customer support was so good, I almost wanted to call them again just to chat. Super helpful—felt like VIP.
              </p>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="client__card">
              <div class="client__details">
                <img src="https://z-p3-scontent.fdac12-1.fna.fbcdn.net/v/t39.30808-6/658113359_1310905124245162_4724790357329432276_n.jpg?stp=dst-jpg_p526x296_tt6&_nc_cat=100&ccb=1-7&_nc_sid=1d70fc&_nc_eui2=AeFEIfJMXh2NHPF29-66Lkkh40atHd_P2tPjRq0d38_a0yzKiC60mHnRyIb1viXD5qtggNcfGMePouiCyuDjSTTl&_nc_ohc=8KvWwW0w1vUQ7kNvwGX9Npi&_nc_oc=Adq0hC18J8d6Xor4TOKtAuj3PMQa2I8YjD-B8K6fDQ_HI74OyxRjptklN3Km7MSXRG4&_nc_zt=23&_nc_ht=z-p3-scontent.fdac12-1.fna&_nc_gid=Jvskyf2NOOXJCV9_apFe6w&_nc_ss=7a3a8&oh=00_Af0alM4WetKTaoLpThjMDSfMxbjQYNAkbPUJLxcaKqc50A&oe=69E29CCC" alt="client" />
                <div>
                  <h4>Abid Jim</h4>
                  <div class="client__rating">
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-line"></i></span>
                  </div>
                </div>
              </div>
              <p>
               Prices so good, I double-checked if it was a typo. Found my perfect car—pickup & drop-off smoother than my excuses.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="footer__logo">
            <a href="#home" class="logo">
              <img src="https://img.icons8.com/ios-filled/50/ffffff/car.png" alt="logo" />
              <span>Car Rental</span>
            </a>
          </div>
          <p>
            We’re here to provide the best vehicles with a smooth, hassle-free rental experience. Stay connected for updates, special offers, and more. Drive with confidence.
          </p>
          <ul class="footer__socials">
            <li><a href="#"><i class="ri-twitter-fill"></i></a></li>
            <li><a href="#"><i class="ri-instagram-line"></i></a></li>
            <li><a href="#"><i class="ri-youtube-fill"></i></a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Our Services</h4>
          <ul class="footer__links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#deals">Rental Deals</a></li>
            <li><a href="#choose">Why Choose Us</a></li>
            <li><a href="#client">Testimonials</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Vehicle Model</h4>
          <ul class="footer__links">
            <li><a href="#">Toyota Corolla</a></li>
            <li><a href="#">Toyota Noah</a></li>
            <li><a href="#">Toyota Allion</a></li>
            <li><a href="#">Toyota Premio</a></li>
            <li><a href="#">Mistubishi Pajero</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Contact</h4>
          <ul class="footer__links">
            <li>
              <a href="#"><span><i class="ri-phone-fill"></i></span> +8801618956088</a>
            </li>
            <li>
              <a href="#"><span><i class="ri-map-pin-fill"></i></span> Dhaka, Bangladesh</a>
            </li>
            <li>
              <a href="#"><span><i class="ri-mail-fill"></i></span> asifhasanarpon21@gmail.com</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
      const authOverlay = document.getElementById('auth-overlay');
      const tabLogin = document.getElementById('tab-login');
      const tabRegister = document.getElementById('tab-register');
      const nameGroup = document.getElementById('name-group');
      const passwordGroup = document.getElementById('password-group');
      const authName = document.getElementById('auth-name');
      const authPassword = document.getElementById('auth-password');
      const authBtn = document.getElementById('auth-btn');
      const authTitle = document.getElementById('auth-title');
      const authForm = document.getElementById('auth-form');
      const authSuccess = document.getElementById('auth-success');
      const authSuccessMsg = document.getElementById('auth-success-msg');
      let isLogin = true;


      tabLogin.addEventListener('click', () => {
        isLogin = true;
        tabLogin.classList.add('active');
        tabRegister.classList.remove('active');
        nameGroup.style.display = 'none';
        authName.required = false;
        

        passwordGroup.style.display = 'flex';
        authPassword.required = true;
        
        authBtn.innerText = 'Login';
        authTitle.innerText = 'Welcome Back';
      });

      tabRegister.addEventListener('click', () => {
        isLogin = false;
        tabRegister.classList.add('active');
        tabLogin.classList.remove('active');
        nameGroup.style.display = 'flex';
        authName.required = true;


        passwordGroup.style.display = 'none';
        authPassword.required = false;

        authBtn.innerText = 'Sign Up';
        authTitle.innerText = 'Create an Account';
      });

      authForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const email = document.getElementById('auth-email').value.trim();
        const phone = document.getElementById('auth-phone').value.trim();
        let fullName = isLogin ? "User" : authName.value.trim();
        
        // Show success state
        authForm.style.display = "none";
        document.querySelector('.auth-tabs').style.display = "none";
        authTitle.style.display = "none";
        authSuccess.style.display = "block";
        authSuccessMsg.innerText = isLogin ? "Login Successful!" : "Registration Successful!";

        // Let them into the site after brief delay
        setTimeout(() => {
          authOverlay.style.opacity = '0';
          authOverlay.style.visibility = 'hidden';
          document.body.classList.remove('locked-screen');
          
          // Inject Profile to Header with BOTH Email and Phone stacked
          const profileHTML = `
            <div class="profile-container">
              <div class="profile-icon" title="View Profile">
                <i class="ri-user-fill"></i>
              </div>
              <div class="profile-dropdown">
                <div class="profile-info">
                  <strong>${fullName}</strong>
                  <span class="info-item"><i class="ri-mail-line"></i> ${email || 'No email provided'}</span>
                  <span class="info-item"><i class="ri-phone-line"></i> ${phone || 'No phone provided'}</span>
                </div>
                <button class="logout-btn" onclick="location.reload()"><i class="ri-logout-box-r-line"></i> Logout</button>
              </div>
            </div>
          `;
          
          document.querySelector(".nav__btns").innerHTML = profileHTML;
          document.querySelector(".nav__links li:last-child").innerHTML = profileHTML;

  
          document.querySelectorAll(".profile-container").forEach(container => {
            const icon = container.querySelector(".profile-icon");
            const dropdown = container.querySelector(".profile-dropdown");

            icon.addEventListener("click", (e) => {
              e.stopPropagation(); 
              document.querySelectorAll(".profile-dropdown").forEach(d => {
                if(d !== dropdown) d.classList.remove("show");
              });
              dropdown.classList.toggle("show");
            });
          });

          initScrollReveal();

        }, 1500);
      });

      window.addEventListener("click", () => {
        document.querySelectorAll(".profile-dropdown").forEach(dropdown => {
          dropdown.classList.remove("show");
        });
      });


      const menuBtn = document.getElementById("menu-btn");
      const navLinks = document.getElementById("nav-links");
      const menuBtnIcon = menuBtn.querySelector("i");

      menuBtn.addEventListener("click", (e) => {
        navLinks.classList.toggle("open");
        const isOpen = navLinks.classList.contains("open");
        menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
      });

      navLinks.addEventListener("click", (e) => {
        navLinks.classList.remove("open");
        menuBtnIcon.setAttribute("class", "ri-menu-line");
      });

      const tabs = document.querySelector(".deals__tabs");
      tabs.addEventListener("click", (e) => {
        if (!e.target.dataset.id) return;
        const tabContents = document.querySelectorAll(
          ".deals__container .tab__content"
        );
        Array.from(tabs.children).forEach((item) => {
          if (item.dataset.id === e.target.dataset.id) {
            item.classList.add("active");
          } else {
            item.classList.remove("active");
          }
        });
        tabContents.forEach((item) => {
          if (item.id === e.target.dataset.id) {
            item.classList.add("active");
          } else {
            item.classList.remove("active");
          }
        });
      });

      const searchForm = document.getElementById("search-form");
      const searchBtn = document.getElementById("search-btn");

      searchForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const originalBtnText = searchBtn.innerHTML;
        searchBtn.innerHTML = "Searching... <i class='ri-loader-4-line ri-spin'></i>";
        setTimeout(() => {
          searchBtn.innerHTML = originalBtnText;
          const dealsSection = document.getElementById("deals");
          dealsSection.scrollIntoView({ behavior: "smooth" });
        }, 800);
      });

      function showToast(message, type = "success") {
        let container = document.getElementById("toast-container");
        if (!container) {
          container = document.createElement("div");
          container.id = "toast-container";
          document.body.appendChild(container);
        }

        const toast = document.createElement("div");
        toast.classList.add("toast", type);
        
        // Dynamically choose the icon based on type
        const iconClass = type === "success" ? "ri-checkbox-circle-fill" : 
                          type === "error" ? "ri-close-circle-fill" : "ri-information-fill";
                          
        toast.innerHTML = `<i class="${iconClass}"></i> <span>${message}</span>`;
        container.appendChild(toast);
        
        setTimeout(() => { toast.classList.add("show"); }, 10);
        setTimeout(() => {
          toast.classList.remove("show");
          setTimeout(() => { toast.remove(); }, 400); 
        }, 3500); 
      }

      function showSuccessModal(carName, email, phone, location) {

        const driverPhone = "+880 1712-345678";

        const overlay = document.createElement("div");
        overlay.style.position = "fixed";
        overlay.style.top = "0";
        overlay.style.left = "0";
        overlay.style.width = "100%";
        overlay.style.height = "100%";
        overlay.style.backgroundColor = "rgba(0,0,0,0.6)";
        overlay.style.display = "flex";
        overlay.style.alignItems = "center";
        overlay.style.justifyContent = "center";
        overlay.style.zIndex = "100000";
        overlay.style.animation = "fadeIn 0.3s ease";

        const modal = document.createElement("div");
        modal.style.backgroundColor = "var(--white)";
        modal.style.padding = "2.5rem";
        modal.style.borderRadius = "1rem";
        modal.style.maxWidth = "400px";
        modal.style.width = "90%";
        modal.style.boxShadow = "0 15px 35px rgba(0,0,0,0.2)";
        modal.style.transform = "translateY(20px)";
        modal.style.animation = "slideUp 0.3s ease forwards";

        modal.innerHTML = `
          <div style="text-align: center; color: #28a745; font-size: 4rem; margin-bottom: 0.5rem;">
            <i class="ri-checkbox-circle-fill"></i>
          </div>
          <h3 style="text-align: center; color: var(--text-dark); margin-bottom: 1.5rem; font-size: 1.5rem;">Rent Hour Successful!</h3>
          <div style="color: var(--text-light); line-height: 2; font-size: 0.95rem; background: var(--extra-light); padding: 1.5rem; border-radius: 0.5rem;">
            <div style="display: flex; justify-content: space-between;">
              <strong style="color: var(--text-dark);">Car:</strong> <span>${carName}</span>
            </div>
            <div style="display: flex; justify-content: space-between;">
              <strong style="color: var(--text-dark);">Email:</strong> <span>${email}</span>
            </div>
            <div style="display: flex; justify-content: space-between;">
              <strong style="color: var(--text-dark);">Your Phone:</strong> <span>${phone}</span>
            </div>
            <div style="display: flex; justify-content: space-between;">
              <strong style="color: var(--text-dark);">Driver Phone:</strong> <span>${driverPhone}</span>
            </div>
            <hr style="border: 0; border-top: 1px solid #ddd; margin: 10px 0;">
            <div style="display: flex; justify-content: space-between;">
              <strong style="color: var(--text-dark);">Location:</strong> <span style="text-align: right; max-width: 60%;">${location}</span>
            </div>
          </div>
          <button id="close-modal-btn" class="btn" style="width: 100%; margin-top: 1.5rem;">Close Receipt</button>
        `;

        overlay.appendChild(modal);
        document.body.appendChild(overlay);

        document.getElementById("close-modal-btn").addEventListener("click", () => {
          document.body.removeChild(overlay);
        });
      }

      const rentBtns = document.querySelectorAll(".deals__card__footer a");
      rentBtns.forEach(btn => {
        btn.addEventListener("click", (e) => {
          e.preventDefault();
          
          // Check if Search Form inputs are filled
          const locationVal = document.getElementById("location").value.trim();
          const startVal = document.getElementById("start").value.trim();
          const stopVal = document.getElementById("stop").value.trim();

          if (!locationVal || !startVal || !stopVal) {
             
             showToast("Please complete the pick-up and return details before renting a car.", "error");
             
             
             document.getElementById("search-form").scrollIntoView({ behavior: "smooth", block: "center" });
          } else {
            
             const card = e.target.closest('.deals__card');
             const carName = card.querySelector('h4').innerText;

           
             const userEmail = document.getElementById('auth-email').value || "Not provided";
             const userPhone = document.getElementById('auth-phone').value || "Not provided";

             showSuccessModal(carName, userEmail, userPhone, locationVal);
          }
        });
      });

      const subscribeForm = document.querySelector(".subscribe__content form");
      if (subscribeForm) {
        subscribeForm.addEventListener("submit", (e) => {
          e.preventDefault(); 
          const emailInput = subscribeForm.querySelector("input").value;
          if (emailInput.trim() !== "") {
            showToast("Successfully subscribed to our newsletter!", "success");
            subscribeForm.reset(); 
          }
        });
      }

      const swiper = new Swiper(".swiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        breakpoints: {
          320: { slidesPerView: 1 },
          768: { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
        }
      });

      function initScrollReveal() {
        const scrollRevealOption = {
          distance: "50px",
          origin: "bottom",
          duration: 1000,
        };

        ScrollReveal().reveal(".header__image img", { ...scrollRevealOption, origin: "right" });
        ScrollReveal().reveal(".header__content h2", { ...scrollRevealOption, delay: 500 });
        ScrollReveal().reveal(".header__content h1", { ...scrollRevealOption, delay: 1000 });
        ScrollReveal().reveal(".header__content .section__description", { ...scrollRevealOption, delay: 1500 });
        ScrollReveal().reveal(".header__form form", { ...scrollRevealOption, delay: 2000 });
        ScrollReveal().reveal(".about__card", { ...scrollRevealOption, interval: 500 });
        ScrollReveal().reveal(".choose__image img", { ...scrollRevealOption, origin: "left" });
        ScrollReveal().reveal(".choose__content .section__header", { ...scrollRevealOption, delay: 500 });
        ScrollReveal().reveal(".choose__content .section__description", { ...scrollRevealOption, delay: 1000 });
        ScrollReveal().reveal(".choose__card", { duration: 1000, delay: 1500, interval: 500 });
        ScrollReveal().reveal(".subscribe__image img", { ...scrollRevealOption, origin: "right" });
        ScrollReveal().reveal(".subscribe__content .section__header", { ...scrollRevealOption, delay: 500 });
        ScrollReveal().reveal(".subscribe__content .section__description", { ...scrollRevealOption, delay: 1000 });
        ScrollReveal().reveal(".subscribe__content form", { ...scrollRevealOption, delay: 1500 });
      }
    </script>
  </body>
</html>