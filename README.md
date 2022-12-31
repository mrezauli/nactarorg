## How to use

- Clone the repository with __git clone__
- change directory into project root (cd nactarog)
- make a database named by "nactarorg" from db server 
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate
- Run __php artisan sheild:install -F -O
- Run __php artisan sheild:generate --all
- Run __php artisan db:seed__ (it has some seeded data for your testing)
- That's it: launch the main URL. 
- You can login to adminpanel by going go `/admin/login` URL and login with credentials __super@admin.com__ - __Pa$$w0rd!__

