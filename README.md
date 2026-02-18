# Dr Nour Musharbash — Ramadan Plan Landing Page

Bilingual (EN / AR) landing page with a **one-click order form**.  
Customer pays 100 JD via CliQ → uploads the screenshot → Nour gets an email with everything attached.

---

## What's in this Folder

```
DrNour/
├── index.html                   ← The full landing page (HTML + CSS + JS, all-in-one)
├── mu-plugin/
│   └── nm-order-handler.php     ← WordPress backend that receives the form & emails you
└── README.md                    ← You are here
```

**Two files. That's all you need.**

---

## Does the Upload & Email Actually Work?

**Yes.** Here's what happens when a customer submits the form:

```
Customer clicks Submit
        │
        ▼
  JavaScript validates all 6 fields + screenshot
        │
        ▼
  Sends everything to WordPress (admin-ajax.php)
        │
        ▼
  nm-order-handler.php receives it:
    1. Validates all fields server-side
    2. Saves the screenshot to wp-content/uploads/
    3. Composes an email with all order details
    4. Attaches the screenshot file
    5. Sends it via wp_mail()
        │
        ▼
  You get an email with:
    • Customer name, email, bank, CliQ username, plan language
    • The payment screenshot attached
```

If something goes wrong (server error, network issue), the form **automatically** shows a fallback message asking the customer to email Dr Nour directly with a pre-filled `mailto:` link.

---

## Step-by-Step: Hostinger Direct Upload (No Elementor)

Since Elementor can be glitchy, we will bypass it entirely and upload the HTML directly.

### Step 1: Create a WordPress Site on Hostinger

1. Log in to **hPanel** (Hostinger dashboard)
2. Create a WordPress site (e.g. `drnourmusharbash.com`)
3. Note down your **WordPress admin URL**: `https://yourdomain.com/wp-admin`

### Step 2: Upload the Backend Plugin (nm-order-handler.php)

This handles the form submission. It must go into the `mu-plugins` folder.

1. In **hPanel**, go to **Files** → **File Manager**
2. Navigate to: `public_html/wp-content/`
3. Create a **New Folder** named `mu-plugins` (if it doesn't exist)
4. Open `mu-plugins` and upload `nm-order-handler.php` from this folder
5. Done! ✅

### Step 3: Upload the Landing Page (index.html)

This is the main website file.

1. In **File Manager**, go back to `public_html` (the root folder)
2. Upload `index.html` directly here
3. **Important Check:**
   - Look for a file named `index.php` in the same folder.
   - **Rename** it to `index_wp_backup.php` (this ensures `index.html` loads first).
   - Do NOT delete it, just rename it.
4. Done! ✅

Now visit `drnourmusharbash.com`. It should load your new landing page instantly.

> **Note:** Even though we bypassed the WordPress theme, the form STILL talks to WordPress (`/wp-admin/admin-ajax.php`) to send emails. It's the best of both worlds: Static HTML speed + WordPress robust backend.

### Step 4: Set Up Email Delivery (Recommended)

WordPress uses PHP `mail()` by default, which **Hostinger may block or send to spam**. To make sure order emails arrive reliably:

1. Go to `wp-admin` → **Plugins** → **Add New**
2. See if you can log in at `yourdomain.com/wp-admin` (it should still work even with index.html)
3. Search for **"WP Mail SMTP"** → Install & Activate
4. Follow the setup wizard with Hostinger's SMTP settings:
   - **Host**: `smtp.hostinger.com`
   - **Port**: `465` (SSL)
   - **Username/Password**: Your Hostinger email credentials
5. Send a **test email** to verify it works

---

## Changing the Recipient Email

The email address that receives orders is set in `nm-order-handler.php` on **line 49**.

Currently it's set to a test email. **Before going live**, change it back to the real one:

```php
// Change this:
$to = 'hatemthedev@gmail.com';

// To:
$to = 'musharbash.nn@gmail.com';
```

Then re-upload the file to `mu-plugins/` (overwrite the old one).
