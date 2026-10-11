# kimiyu.web

The landing page of the kimiyu studio, linking to its apps. Live at [kimiyu.ch](https://kimiyu.ch).

A single-page Laravel 13 site styled with Tailwind CSS 4.

## Local development

The site runs in [Herd](https://herd.laravel.com) at `https://kimiyu.web.test`.

```sh
composer install
npm install
cp .env.example .env && php artisan key:generate
npm run dev       # or: npm run build
```

## Deploying

```sh
npm run build     # if you changed the design; commit public/build
./deploy.sh
```

`deploy.sh` runs the tests, exports the committed code, installs production dependencies and syncs it to Hostpoint over SSH with your own key. The server's `.env`, `public/.htaccess` (the PHP version is set there through the Hostpoint panel) and `storage/` are left alone. GitHub Actions only runs the tests.

## Where things are

| | |
|---|---|
| `resources/views/home.blade.php` | The landing page |
| `resources/views/components/app-card.blade.php` | One app's card on the landing page |
| `resources/views/components/layouts/app.blade.php` | The HTML shell, fonts and meta tags |
| `config/kimiyu.php` | The apps shown on the page, contact email and GitHub link |
| `resources/css/app.css` | Theme colors (`honey` for the studio, plus each app's own) and fonts |
| `routes/web.php` | The pages, and redirects for links to the old Wallaby app that lived here |
| `artwork/` | The studio mark, the kimiyu bear |
| `scripts/make-icon.mjs` | Puts the bear on its honey tile and renders the favicons (`node scripts/make-icon.mjs`) |

The site sets no cookies: the session and CSRF middleware are removed in `bootstrap/app.php`, since there are no forms.
