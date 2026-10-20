# Software House Website — WordPress Setup (Laragon)

Professional WordPress website setup for a software house offering
**SEO, Digital Marketing, Web Designing & Web Development** services.

> Note: GitHub code rakhne ki jagah hai, WordPress wahan run nahi hoti.
> Is liye is repo mein complete one-click installer hai — ye aapke
> Laragon localhost par asal WordPress install karta hai.

## Stack
- **WordPress** (latest, wordpress.org se)
- **Kadence Theme** (light theme) + **Kadence Blocks** plugin
- **Rank Math SEO** plugin
- **LiteSpeed Cache** plugin

## Install kaise karein (Laragon, Windows)

1. Is repo ki files `Install-WordPress.bat` aur `Install-WordPress.ps1`
   Laragon ke www folder mein rakhein:
   `C:\laragon\www`
   (GitHub se Code → Download ZIP karke dono files nikaal lein)
2. Laragon **Start All** karein (taake MySQL chale)
3. `Install-WordPress.bat` par **double-click** karein aur `Y` likhein
4. Script khud ye karega:
   - Purana PHP code `muse` folder se hata kar `muse-old-php-backup` mein mehfooz karega
   - WordPress download / install karega
   - Kadence Theme, Kadence Blocks, Rank Math aur LiteSpeed Cache install karega
   - Database `muse_wp` aur `wp-config.php` bana dega
5. Browser mein `http://muse.test` khol kar WordPress wizard complete karein
   (site ka naam + apna admin username/password khud set karein)
6. wp-admin mein:
   - **Appearance → Themes → Kadence → Activate**
   - **Plugins →** Kadence Blocks, Rank Math, LiteSpeed Cache teeno **Activate**

## Purana PHP Code
Pehli PHP homepage is repo ki Git history mein mehfooz hai
(commits `12a18f9` aur `82a67eb`) — kabhi zaroorat ho to wahan se mil jayegi.
