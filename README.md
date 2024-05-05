# Legal-Affairs

Office of the University Legal Counsel's legal affairs system that handles administrative cases, processes university clearance, and tracks document records going in-and-out of the legal office that is only exclusive to the employees within the legal office.

## Prerequisities

* [Laravel](https://laravel.com/docs/11.x/installation#creating-a-laravel-project)
* [Livewire](https://livewire.laravel.com/docs/installation)
* [Tailwindcss](https://tailwindcss.com/docs/guides/laravel#vite)

## Dependencies

**DaisyUI**

You need Node.js and Tailwind CSS installed.

1. Install daisyUI as a Node package.
   
   ```shell
   npm i -D daisyui@latest
   ```
3. Add daisyUI to tailwind.config.js:
   
   ```shell
   module.exports = {
      //...
      plugins: [
        require('daisyui'),
      ],
   }
   ```
   
<br>

**barryvdh/laravel-dompdf**

Run this command in the terminal:

```shell
composer require barryvdh/laravel-dompdf
```

Enable php gd extension:

1. Open XAMPP
2. Go to Apache Config button and click on ***PHP(php.ini)***
3. Search for ***;extension=gd*** and remove the ;


<br>
<br>

## Contributors

* **Robin Bryan Alcaide** - *Project Manager*
* **Greg Andrew Rivera** - *Business Analyst*
* **Richard Aaron Inciong** - *UI/UX*
* **Jemuel Frian Masigla** - *Lead Programmer*
* **Jed Laurence David** - *Support Programmer*
