/** @type {import('tailwindcss').Config} */
export default {
    content: [
		'./resources/**/*.blade.php',
		 './resources/**/*.js',
		 './resources/**/*.vue',
		 './app/Http/Livewire/**/*.php',
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',

	],



  theme: {
    extend: {



    },
  },
  plugins: [
		require("daisyui")
	],

	// daisyUI config (optional - here are the default values)
	daisyui: {

        themes: [
            {
                mytheme: {
                    primary: '#800080',
                    secondary: '#3a9a1f',
                    accent: '#37CDBE',
                    neutral: '#3D4451',
                    'base-100': '#FFFFFF',
                    info: '#3ABFF8',
                    success: '#36D399',
                    warning: '#FBBD23',
                    error: '#F87272',
                },
            },
        ],





	},


}

