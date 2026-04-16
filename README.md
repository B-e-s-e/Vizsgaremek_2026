# A webalkalmazás indítása

## Backend indítása

A backend indításához az alábbi lépések szükségesek:

1. Indítsa el a XAMPP Control Panelt

2. Indítsa el az Apache és MySQL szolgáltatásokat

3. Nyissa meg a backend projekt mappáját Visual Studio Code-ban

6. Terminálban futtassa az alábbi parancsokat:
```bash
php artisan migrate --seed
php artisan serve
A backend ezek után az alábbi címen lesz elérhető:
```
## Frontend indítása

A frontend futtatásához:

1. Nyissa meg a frontend projekt mappáját

2. Terminálban [npm](https://docs.npmjs.com/cli/v11) CLI-ben futtassa:

```bash
npm install
npm install bootstrap@5.3.8
ng serve
```
