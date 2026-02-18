# Dr Nour Musharbash — Ramadan Plan Landing Page

Bilingual (EN / AR) landing page with a **one-click order form**.  
Customer pays 100 JD via CliQ → uploads the screenshot → Nour gets an email with everything attached.

---

## What's in this Folder

```
DrNour/
├── index.html                   ← The full landing page (just this one file)
└── README.md                    ← You are here
```

**One file. That's it.**

No WordPress, no PHP, no Elementor. Pure HTML that works anywhere.

---

## How the Form Works

```
Customer fills in all fields + uploads screenshot
        │
        ▼
  JavaScript validates everything client-side
        │
        ▼
  Sends to FormSubmit.co (free service, unlimited submissions)
        │
        ▼
  FormSubmit emails you:
    • Name, Email, Bank, CliQ Username, Plan Language
    • Payment screenshot attached
        │
        ▼
  Customer sees green "Success!" message
  If anything fails → fallback "Email Nour directly" with mailto link
```

---

## Deploy on Netlify (Free — 2 Minutes)

### Step 1: Go to Netlify Drop

1. Open **[app.netlify.com/drop](https://app.netlify.com/drop)** in your browser
2. If you don't have an account, sign up (free)

### Step 2: Create a Deploy Folder

1. On your Desktop, create a folder called `drnour`
2. Copy `index.html` into that folder
3. That's it — just one file in one folder

### Step 3: Drag & Drop

1. Drag the entire `drnour` folder onto the Netlify Drop page
2. Wait 5 seconds
3. You get a URL like: `https://random-name-12345.netlify.app`
4. **Done! Your site is live!** ✅

### Step 4 (Optional): Custom Subdomain

1. In Netlify, go to **Site Settings** → **Domain management**
2. Click **Change site name**
3. Type something like `drnour` → now your URL is `https://drnour.netlify.app`

---

## Activate FormSubmit (One-Time — 30 Seconds)

FormSubmit.co requires email confirmation the **very first time** someone submits the form.

1. Go to your live site
2. Fill in test data in all fields and upload any image
3. Click **Submit**
4. Check your email inbox (`hatemthedev@gmail.com`) for a **confirmation email from FormSubmit**
5. Click the **confirmation link** in that email
6. Done! All future submissions will arrive automatically ✅

> **Important:** You only need to do this ONCE. After confirming, all submissions go straight to your inbox — no limits, no charges.

---

## Changing the Recipient Email

When you're ready to go live with Dr Nour's real email, open `index.html` and search for:

```
hatemthedev@gmail.com
```

Replace every occurrence with:

```
musharbash.nn@gmail.com
```

There are **5 places** to change (3 mailto links, 1 footer text, 1 FormSubmit URL).

Then re-deploy by dragging the folder to Netlify again.

> **Remember:** After changing the email, you need to do the FormSubmit confirmation step again with the new email address.

---

## FAQ

| Question | Answer |
|----------|--------|
| **Cost?** | **$0** — Netlify free + FormSubmit free |
| **Submission limits?** | **Unlimited** on FormSubmit |
| **File uploads?** | Yes — screenshots attached to email |
| **Will I get charged?** | No — Netlify free tier has 100GB bandwidth (way more than needed) |
| **Mobile friendly?** | Yes — fully responsive |
| **Arabic support?** | Yes — full RTL with language toggle |
| **What if FormSubmit is down?** | Fallback shows "email Nour directly" with pre-filled mailto link |
| **Can I use a custom domain?** | Yes — add it in Netlify Domain Management (requires DNS update) |
| **How do I update the site?** | Edit `index.html`, drag the folder to Netlify again |
