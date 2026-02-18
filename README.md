# Dr Nour Musharbash — Ramadan Plan Landing Page

Bilingual (EN / AR) landing page with a **one-click order form**.  
Customer pays 100 JD via CliQ → uploads the screenshot → Nour gets the order.

---

## What's in this Folder

```
DrNour/
├── index.html       ← The full landing page (just this one file)
└── README.md        ← You are here
```

**One file. That's it.** No WordPress, no PHP, no backend.

---

## Deploy on Netlify (Free — 2 Minutes)

### Step 1: Drag & Drop

1. Create a folder called `drnour` and put `index.html` inside
2. Go to **[app.netlify.com/drop](https://app.netlify.com/drop)**
3. Drag the folder → instant URL ✅

### Step 2: Set Up Email Notifications

Netlify stores all submissions in its dashboard, but to **get emails** when orders arrive:

1. In Netlify, go to your site → **Site configuration** → **Forms** → **Form notifications**
2. Click **Add notification** → **Email notification**
3. Set:
   - **Event**: New form submission
   - **Email**: `hatemthedev@gmail.com` (or the real email later)
   - **Form**: `order`
4. Save ✅

Now every submission (including screenshot file) will be emailed to you.

### Step 3: Download Screenshots

Uploaded screenshots are stored in Netlify's dashboard:

1. Go to your site → **Forms** → **order**
2. Click any submission → download the attached file

---

## Changing the Recipient Email

When going live, search `index.html` for `hatemthedev@gmail.com` and replace with `musharbash.nn@gmail.com`. Also update the Netlify email notification.

---

## FAQ

| Question | Answer |
|----------|--------|
| **Cost?** | **$0** — Netlify free tier |
| **Submission limit?** | 100/month on free plan (plenty for a Ramadan promo) |
| **File uploads?** | Yes — stored in Netlify, linked in email notification |
| **Will I get charged?** | No — free tier has 100GB bandwidth |
| **Mobile?** | Fully responsive |
| **Arabic?** | Full RTL with language toggle |
