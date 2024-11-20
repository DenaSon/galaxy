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
    extend: {},
  },
  plugins: [
		require("daisyui")
	],

	// daisyUI config (optional - here are the default values)
	daisyui: {
        themes: false, // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "cupcake"]

	},


}

