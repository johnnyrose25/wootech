<!doctype html>
<html lang="en">
@php ( wp_head() )
<body>
	<header x-data="{ isOpen: false }" class="bg-white border-b-4 border-gradient relative">
		<div class="container flex flex-wrap justify-between py-8">
			<a href="index.html" class="flex">
				<img src="{!! get_template_directory_uri() !!}/resources/images/logo.svg" width="140" height="73" alt="Medical">
			</a>
			<div x-data="{dropdownMenu: false}" class="flex items-center md:order-2 relative">
				<span class="border-l border-gray-200 pl-4">
					<button @click="dropdownMenu = ! dropdownMenu" :class="{ 'text-blue-100': dropdownMenu }" type="button" class="flex items-center text-sm font-bold text-gray-100 hover:text-blue-100" id="user-menu-button" :aria-expanded="dropdownMenu ? 'true' : 'false'">
						<span class="relative inline-block rounded-full text-red-50">
							<svg class="w-7 h-7 md:w-6 md:h-6" aria-hidden="true" focusable="false" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.652 14.001C14.0992 14.001 16.083 12.0172 16.083 9.57001C16.083 7.12283 14.0992 5.13901 11.652 5.13901C9.20482 5.13901 7.22099 7.12283 7.22099 9.57001C7.22099 12.0172 9.20482 14.001 11.652 14.001Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M18.4599 19.729C16.622 17.9836 14.1842 17.0104 11.6495 17.0104C9.11486 17.0104 6.6769 17.9836 4.83897 19.729" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M11.653 22.306C17.5365 22.306 22.306 17.5365 22.306 11.653C22.306 5.76951 17.5365 1 11.653 1C5.76951 1 1 5.76951 1 11.653C1 17.5365 5.76951 22.306 11.653 22.306Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							<span class="hidden absolute bottom-0 right-0 h-2 w-2 rounded-full bg-green-50 z-2"></span>
						</span>
						<span class="ml-3 text-inherit hidden lg:inline-block">My account</span>
					</button>
				</span>
				<div x-show="dropdownMenu" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" @click.outside="dropdownMenu = false" class="absolute top-full right-0 z-50 w-60 list-none bg-white rounded-[10px] shadow-mx" id="user-menu">
					<div class="py-4 px-4 bg-gray-400 rounded-t-[10px]">
						<span class="block text-sm font-bold text-gray-100 truncate">stefano.tiller@gmail.com</span>
					</div>
					<ul class="list-none divide-y divide-gray-400">
						<li>
							<a href="#" class="block py-3 px-4 text-xs font-semibold text-gray-200 hover:text-gray-100 hover:bg-gray-400">My settings</a>
						</li>
						<li>
							<a href="#" class="block py-3 px-4 text-xs font-semibold text-gray-200 hover:text-gray-100 hover:bg-gray-400">My videos</a>
						</li>
						<li>
							<a href="#" class="block py-3 px-4 text-xs font-semibold text-gray-200 hover:text-gray-100 hover:bg-gray-400 rounded-b-[10px]">Logout</a>
						</li>
					</ul>
				</div>
				<button @click="isOpen = !isOpen" :class="{ 'text-blue-100': isOpen }" :aria-expanded="isOpen ? 'true' : 'false'" class="menu-toggler inline-flex items-center p-1 ml-3 text-sm text-gray-100 hover:text-blue-100 rounded-lg md:hidden hover:bg-transparent focus:outline-none focus:ring-0 focus:text-blue-100 focus:bg-white" type="button" aria-controls="mobile-menu">
					<span class="sr-only">Open main menu</span>
					<svg x-show="!isOpen" class="w-6 h-6" width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1H17.063" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M1 8.079H17.063" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M1 15.158H9.381" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					<svg x-show="isOpen" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
				</button>
			</div>
			<nav x-bind:class="! isOpen ? 'hidden' : ''" class="nav fixed md:static left-0 bg-slate-50 z-10 overflow-y-auto md:overflow-y-visible md:bg-transparent justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu">
				<ul class="flex flex-col mt-6 pb-6 md:pb-0 md:flex-row md:space-x-4 lg:space-x-14 md:mt-0 text-base md:text-[15px] font-bold">
					<li class="dropdown">
						<a href="{!! home_url() !!}/shop"
							class="block py-1 px-4 md:p-0 md:hover:bg-transparent text-blue-100 transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-blue-100">PRODUCTS</a>
						<div
							class="md:hidden submenu pb-6 md:absolute z-40 md:top-full md:left-0 md:right-0 w-full md:py-4 md:bg-gradient-to-r from-[#1f557a] to-[#638ba0]">
							<div class="md:container md:px-4 px-0">
								<ul
									class="list-none md:flex md:flex-row md:justify-center md:space-x-4 lg:space-x-8 font-medium text-sm md:text-[13px]">
									<li>
										<a href="eyeview.html" class="block py-2 px-4 md:p-0 hover:bg-gray-400 md:hover:bg-transparent text-blue-100 md:text-white transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-white md:uppercase">eyeView</a>
									</li>
									<li>
										<a  href="myeyes.html" class="block py-2 px-4 md:p-0 hover:bg-gray-400 md:hover:bg-transparent text-blue-100 md:text-white transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-white md:uppercase">eyeCare</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class="dropdown">
						<a href="#"
							class="block py-1 px-4 md:p-0 md:hover:bg-transparent text-blue-100 transition-colors duration-200 transform md:border-b-2 md:border-blue-100 md:hover:border-blue-100">PHYSICIANS</a>
						<div
							class="submenu pb-6 md:absolute z-40 md:top-full md:left-0 md:right-0 w-full md:py-4 md:bg-gradient-to-r from-[#1f557a] to-[#638ba0]">
							<div class="md:container md:px-4 px-0">
								<ul
									class="list-none md:flex md:flex-row md:justify-center md:space-x-4 lg:space-x-8 font-medium text-[13px]">
									<li>
										<a href="clinical-benefits.html" class="block py-2 px-4 md:p-0 hover:bg-gray-400 md:hover:bg-transparent text-blue-100 md:text-white transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-white md:uppercase">Clinical benefits</a>
									</li>
									<li>
										<a href="surgery.html" aria-current="page" class="block py-2 px-4 md:p-0 md:hover:bg-transparent text-white bg-blue-100 md:bg-transparent md:text-white transition-colors duration-200 transform md:border-b-2 md:border-white md:hover:border-white md:uppercase">Surgery</a>
									</li>
									<li>
										<a href="patient-management.html" class="block py-2 px-4 md:p-0 hover:bg-gray-400 md:hover:bg-transparent text-blue-100 md:text-white transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-white md:uppercase">Patient Management</a>
									</li>
									<li>
										<a href="publications.html" class="block py-2 px-4 md:p-0 hover:bg-gray-400 md:hover:bg-transparent text-blue-100 md:text-white transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-white md:uppercase">Publications</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li class="dropdown">
						<a href="#"
							class="block py-1 px-4 md:p-0 md:hover:bg-transparent text-blue-100 transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-blue-100">PATIENTS</a>
						<div
							class="md:hidden submenu pb-6 md:absolute z-40 md:top-full md:left-0 md:right-0 w-full md:py-4 md:bg-gradient-to-r from-[#1f557a] to-[#638ba0]">
							<div class="md:container md:px-4 px-0">
								<ul
									class="list-none md:flex md:flex-row md:justify-center md:space-x-4 lg:space-x-8 font-medium text-[13px]">
									<li>
										<a href="patient-benefits.html" class="block py-2 px-4 md:p-0 hover:bg-gray-400 md:hover:bg-transparent text-blue-100 md:text-white transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-white md:uppercase">Patient Benefits</a>
									</li>
									<li>
										<a href="mri-safety.html" class="block py-2 px-4 md:p-0 hover:bg-gray-400 md:hover:bg-transparent text-blue-100 md:text-white transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-white md:uppercase">MRI Safety</a>
									</li>
									<li>
										<a href="{!! home_url() !!}/testimonials" class="block py-2 px-4 md:p-0 hover:bg-gray-400 md:hover:bg-transparent text-blue-100 md:text-white transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-white md:uppercase">Testimonials</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
					<li>
						<a href="news.html" class="block py-1 px-4 md:p-0 hover:bg-gray-400 md:hover:bg-transparent text-blue-100 transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-blue-100">NEWS</a>
					</li>
					<li>
						<a href="contact.html" class="block py-1 px-4 md:p-0 hover:bg-gray-400 md:hover:bg-transparent text-blue-100 transition-colors duration-200 transform md:border-b-2 md:border-transparent md:hover:border-blue-100">CONTACT</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	@php ( the_content() )	
		
		<div class="bg-blue-200 md:border-b-[8rem] border-gray-400">
			<div class="container pt-16 pb-1">
				<div class="md:flex items-center justify-between pb-8 md:pb-16">
					<h2 class="text-white mb-4 md:mb-0" data-aos="fade-up">Latest News</h2>
					<a class="hidden md:flex-shrink-0 md:inline-block py-[14px] px-10 transition ease-in duration-200 text-[13px] font-bold border text-white border-white hover:bg-blue-100 focus:bg-blue-100 hover:text-white focus:text-white hover:border-blue-100 focus:border-blue-100 focus:outline-none" href="#" data-aos="fade-up" data-aos-delay="100">SEE ALL</a>
				</div>
				<div class="grid gap-8 row-gap-5 md:-mb-20 md:row-gap-8 md:grid-cols-3">
					<div class="relative flex flex-col bg-white px-6 py-8 sm:px-8 md:p-4 pb-2 lg:p-12 lg:pb-2 transition duration-300 hover:shadow-xs" data-aos="fade-up">
						<h3 class="text-[28px] font-semibold mb-16"><a class="text-blue-100 hover:underline" href="#">First eyeView implanted in Germany!</a></h3>
						<div class="flex items-center justify-between border-t border-gray-400 mt-auto py-7">
							<div class="text-gray-200 text-xs font-medium flex items-center pr-5">
								<svg class="inline-block mr-2" aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.998 20.996C16.5197 20.996 20.996 16.5197 20.996 10.998C20.996 5.47626 16.5197 1 10.998 1C5.47626 1 1 5.47626 1 10.998C1 16.5197 5.47626 20.996 10.998 20.996Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M14.189 12.398H9.999V7.598" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								24 Aug, 2022
							</div>
							<a class="absolute bottom-0 right-0 p-4 bg-red-50 hover:bg-red-500 text-white flex-shrink-0" href="#">
								<svg aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6 0V6H0V8H6V14H8V8H14V6H8V0H6Z" fill="currentColor"/>
								</svg>
							</a>
						</div>
					</div>
					<div class="relative flex flex-col bg-white px-6 py-8 sm:px-8 md:p-4 pb-2 lg:p-12 lg:pb-2 transition duration-300 hover:shadow-xs"  data-aos="fade-up" data-aos-delay="50">
						<h3 class="text-[28px] font-semibold mb-16"><a class="text-blue-100 hover:underline" href="#">Meet Medical SA at ESCS 2022!</a></h3>
						<div class="flex items-center justify-between border-t border-gray-400 mt-auto py-7">
							<div class="text-gray-200 text-xs font-medium flex items-center pr-5">
								<svg class="inline-block mr-2" aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.998 20.996C16.5197 20.996 20.996 16.5197 20.996 10.998C20.996 5.47626 16.5197 1 10.998 1C5.47626 1 1 5.47626 1 10.998C1 16.5197 5.47626 20.996 10.998 20.996Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M14.189 12.398H9.999V7.598" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								3 Sep, 2022
							</div>
							<a class="absolute bottom-0 right-0 p-4 bg-red-50 hover:bg-red-500 text-white flex-shrink-0" href="#">
								<svg aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6 0V6H0V8H6V14H8V8H14V6H8V0H6Z" fill="currentColor"/>
								</svg>
							</a>
						</div>
					</div>
					<div class="relative flex flex-col bg-white px-6 py-8 sm:px-8 md:p-4 pb-2 lg:p-12 lg:pb-2 transition duration-300 hover:shadow-xs"  data-aos="fade-up" data-aos-delay="100">
						<h3 class="text-[28px] font-semibold mb-16"><a class="text-blue-100 hover:underline" href="#">Medical SA gains popularity in series 2022</a></h3>
						<div class="flex items-center justify-between border-t border-gray-400 mt-auto py-7">
							<div class="text-gray-200 text-xs font-medium flex items-center pr-5">
								<svg class="inline-block mr-2" aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M10.998 20.996C16.5197 20.996 20.996 16.5197 20.996 10.998C20.996 5.47626 16.5197 1 10.998 1C5.47626 1 1 5.47626 1 10.998C1 16.5197 5.47626 20.996 10.998 20.996Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M14.189 12.398H9.999V7.598" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								24 Nov, 2022
							</div>
							<a class="absolute bottom-0 right-0 p-4 bg-red-50 hover:bg-red-500 text-white flex-shrink-0" href="#">
								<svg aria-hidden="true" focusable="false" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M6 0V6H0V8H6V14H8V8H14V6H8V0H6Z" fill="currentColor"/>
								</svg>
							</a>
						</div>
					</div>
				</div>
				<div class="text-center md:hidden py-8">
					<a class="flex-shrink-0 inline-block py-[14px] px-10 transition ease-in duration-200 text-[13px] font-bold border text-white border-white hover:bg-blue-100 focus:bg-blue-100 hover:text-white focus:text-white hover:border-blue-100 focus:border-blue-100 focus:outline-none" href="#">SEE ALL</a>
				</div>
			</div>
		</div>
		<div class="relative">
			<img class="absolute inset-0 object-cover w-full h-full" src="{!! get_template_directory_uri() !!}/resources/images/bg_get_in_touch.jpg" width="1920" height="250" alt="get in touch">
			<div class="relative bg-opacity-50 bg-gray-100 py-10 md:py-14">
				<div class="container text-center pb-3">
					<h2 class="text-white mb-10" data-aos="zoom-in">Get in touch</h2>
					<a class="inline-block px-8 py-4 text-[13px] font-bold transition duration-200 text-blue-100 hover:text-white focus:text-white bg-blue-300 hover:bg-blue-100 focus:bg-blue-100 hover:shadow-xs focus:shadow-xs focus:outline-none" href="contact.html" data-aos="fade-up" data-aos-delay="100">Contact Us</a>
				</div>
			</div>
		</div>
		<div class="container pt-10 pb-6 md:pt-14 md:pb-8">
			<h2 class="text-center text-gray-100" data-aos="fade-up">Our Partners</h2>
			<div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-5 py-8">
				@php ( $partners = get_field('images','options') )
				@foreach ($partners as $logo)			
					<div class="flex items-center justify-center lg:justify-start p-6 lg:pl-0 grayscale hover:grayscale-0" data-aos="fade-up" data-aos-duration="1000">
						<img src="{!! $logo['image']['url'] !!}" width="{!! $logo['image']['width'] !!}" height="{!! $logo['image']['height'] !!}" alt="{!! $logo['image']['name'] !!}">
					</div>
				@endforeach			
			</div>
		</div>
	</main><!-- /.main -->
	<footer class="footer bg-blue-100 bg-halftone text-white">
		<div class="container pt-14 pb-10">
			<div class="grid gap-10 lg:gap-16 row-gap-10 mb-4 lg:mb-0 lg:grid-cols-6">
				<div class="md:max-w-md lg:col-span-2">
					<p class="text-[13px] mb-5"><strong>Medical SA</strong> provides medical devices for the treatment of glaucoma. Please contact the company to know if the products are available in your country.</p>
					<div class="mb-2">
						<a class="inline-block py-[14px] px-6 transition ease-in duration-200 text-[13px] font-bold border text-white border-white hover:border-blue-300 focus:outline-none" href="#">CONTACT US</a>
					</div>
				</div>
				<div class="grid grid-cols-2 gap-5 row-gap-8 lg:col-span-4 md:grid-cols-4 mb-6 lg:mb-0 font-medium">
					<div>
						<h4 class="text-base font-semibold tracking-wide text-white mb-3">PRODUCTS</h4>
						<ul class="list-none mt-2 space-y-3 text-sm">
							<li>
							<a href="#" class="text-white transition-colors duration-200 hover:text-blue-300 border-b border-transparent hover:border-blue-300">eyeView</a>
							</li>
							<li>
							<a href="#" class="text-white transition-colors duration-200 hover:text-blue-300 border-b border-transparent hover:border-blue-300">eyeCare</a>
							</li>
						</ul>
					</div>
					<div>
						<h4 class="text-base font-semibold tracking-wide text-white mb-3">PHYSICIANS</h4>
						<ul class="list-none mt-2 space-y-3 text-sm">
							<li>
							<a href="#" class="text-white transition-colors duration-200 hover:text-blue-300 border-b border-transparent hover:border-blue-300">Clinical benefits</a>
							</li>
							<li>
							<a href="#" class="text-white transition-colors duration-200 hover:text-blue-300 border-b border-transparent hover:border-blue-300">Surgery</a>
							</li>
							<li>
							<a href="#" class="text-white transition-colors duration-200 hover:text-blue-300 border-b border-transparent hover:border-blue-300">Patient Management</a>
							</li>
							<li>
							<a href="#" class="text-white transition-colors duration-200 hover:text-blue-300 border-b border-transparent hover:border-blue-300">Publications</a>
							</li>
						</ul>
					</div>
					<div>
						<h4 class="text-base font-semibold tracking-wide text-white mb-3">PATIENTS</h4>
						<ul class="list-none mt-2 space-y-2 text-sm">
							<li>
							<a href="#" class="text-white transition-colors duration-200 hover:text-blue-300 border-b border-transparent hover:border-blue-300">Patient Benefits</a>
							</li>
							<li>
							<a href="#" class="text-white transition-colors duration-200 hover:text-blue-300 border-b border-transparent hover:border-blue-300">MR Safety</a>
							</li>
							<li>
							<a href="#" class="text-white transition-colors duration-200 hover:text-blue-300 border-b border-transparent hover:border-blue-300">Testimonials</a>
							</li>
						</ul>
					</div>
					<div>
						<h4 class="text-base font-semibold tracking-wide text-white mb-3">
							<a class="text-white transition-colors duration-200 hover:text-blue-300 border-b border-transparent hover:border-blue-300" href="#">NEWS</a>
						</h4>
					</div>
				</div>
			</div>
			<div class="2xl:w-1/3 xl:w-2/5 lg:w-1/2 md:w-2/3 py-3">
				<div class="grid sm:grid-flow-col sm:gap-4 pb-8">
					<div class="order-2 sm:order-none">
						<div class="mb-2">
							<a class="inline-flex flex-start text-sm text-white hover:text-blue-300 font-bold" href="tel:0793471808">
								<svg class="mr-4" aria-hidden="true" focusable="false" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.231 13.112C7.19313 15.206 9.73449 16.6681 12.531 17.3119C13.754 17.3959 14.593 16.3249 14.951 15.1759C15.266 14.1879 13.842 13.076 12.689 12.429C10.983 11.41 10.624 11.837 10.151 12.586" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M5.22901 13.1099C3.12768 11.1645 1.65688 8.63468 1.00602 5.84603C0.922019 4.62903 1.99801 3.79395 3.15201 3.43795C4.14501 3.12395 5.26302 4.53795 5.91302 5.68795C6.93702 7.38795 6.51301 7.74298 5.75501 8.21298" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M9.935 1.00106C10.9615 0.980551 11.9817 1.16707 12.9346 1.54952C13.8874 1.93197 14.7535 2.50247 15.481 3.22701C16.2079 3.94754 16.7811 4.80808 17.1657 5.75655C17.5504 6.70502 17.7386 7.72176 17.719 8.74508" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M9.86401 4.74406C10.4072 4.72216 10.9491 4.81231 11.456 5.00895C11.9628 5.2056 12.4237 5.50447 12.81 5.88701C13.1936 6.26963 13.4937 6.72773 13.6913 7.23222C13.8889 7.73671 13.9797 8.27666 13.958 8.81804" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								079 347 1808
							</a>
						</div>
						<div class="mb-2">
							<a class="inline-flex flex-start text-sm text-white hover:text-blue-300 hover:underline" href="mailto:info@example.com">
								<svg class="mr-4" aria-hidden="true" focusable="false" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M16.649 6.13502L9.09101 10.007C8.96891 10.0696 8.8335 10.1018 8.69629 10.1007C8.55909 10.0997 8.42418 10.0654 8.30305 10.001L1.04902 6.15998C1.04376 6.15717 1.03788 6.15582 1.03193 6.15601C1.02597 6.15621 1.02015 6.15794 1.01508 6.16108C1.01002 6.16422 1.00588 6.16865 1.00306 6.1739C1.00024 6.17915 0.998852 6.18503 0.999029 6.19099V15.203C0.997432 15.4336 1.0874 15.6553 1.24921 15.8196C1.41103 15.9838 1.63144 16.0771 1.86201 16.079H15.789C16.0196 16.0771 16.24 15.9838 16.4018 15.8196C16.5636 15.6553 16.6536 15.4336 16.652 15.203L16.649 6.13502Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
									<path d="M1.00601 6.12802L7.32101 1.57602C7.76451 1.255 8.298 1.08218 8.84549 1.08218C9.39298 1.08218 9.92647 1.255 10.37 1.57602L16.639 6.12302" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
								</svg>
								info@address.com
							</a>
						</div>
					</div>
					<div>
						<div class="flex flex-start text-xs mb-2">
							<svg class="mr-4" aria-hidden="true" focusable="false" width="21" height="24" viewBox="0 0 21 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M10.3359 0.999977C7.86082 1.00315 5.48816 1.98786 3.73801 3.73801C1.98786 5.48817 1.00315 7.86095 0.999973 10.336C0.999973 15.223 5.51603 19.473 8.20603 21.573C8.81487 22.0478 9.56475 22.3058 10.3369 22.3058C11.109 22.3058 11.8591 22.0478 12.468 21.573C15.158 19.481 19.674 15.223 19.674 10.336C19.6709 7.8606 18.6859 5.48749 16.9353 3.73728C15.1847 1.98707 12.8113 1.00262 10.3359 0.999977Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M10.3368 14.6721C9.38576 14.6724 8.456 14.3908 7.66497 13.8627C6.87394 13.3347 6.25713 12.5839 5.89275 11.7054C5.52838 10.8269 5.43276 9.86008 5.61785 8.92718C5.80294 7.99427 6.26062 7.13716 6.93279 6.46429C7.60496 5.79142 8.46151 5.33296 9.39422 5.1469C10.3269 4.96085 11.2939 5.05554 12.1728 5.419C13.0517 5.78246 13.8031 6.39841 14.332 7.1889C14.8608 7.97938 15.1434 8.90895 15.144 9.86004V9.86004C15.1434 11.1352 14.637 12.3581 13.7358 13.2603C12.8345 14.1625 11.612 14.6702 10.3368 14.6721Z" stroke="currentColor" stroke-width="1.973" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							<address class="not-italic leading-5">
								<strong class="font-semibold">Medical SA</strong> <br>
								EMFLD Inno Glade, Building B <br>
								1015 Med St., Italy
							</address>
						</div>
					</div>
				</div>
				<div class="flex items-center space-x-4 mb-3">
					<a href="#" target="_blank" class="text-white transition-colors duration-200 hover:text-blue-300">
						<svg aria-hidden="true" focusable="false" width="30" height="22" viewBox="0 0 30 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M28.561 3.793C28.3586 3.03045 27.9593 2.33451 27.4031 1.77497C26.8469 1.21543 26.1533 0.811952 25.392 0.605C23.212 0.017 15.458 0 14.581 0C13.704 0 5.95 0.017 3.771 0.605C3.00942 0.81156 2.31555 1.21475 1.75898 1.77412C1.20242 2.3335 0.802725 3.02939 0.600001 3.792C0.183531 6.03703 -0.0173824 8.31673 7.47154e-07 10.6C-0.0172807 12.8843 0.183631 15.1649 0.600001 17.411C0.802332 18.1739 1.20174 18.8701 1.75814 19.4298C2.31454 19.9896 3.00837 20.3931 3.77 20.6C5.95 21.188 13.704 21.205 14.581 21.205C15.458 21.205 23.212 21.188 25.391 20.6C26.1525 20.3932 26.8463 19.9898 27.4027 19.4302C27.959 18.8707 28.3585 18.1747 28.561 17.412C28.9772 15.1659 29.1781 12.8852 29.161 10.601C29.1779 8.31775 28.977 6.0381 28.561 3.793V3.793ZM26.4 16.839C26.2984 17.2216 26.0981 17.5708 25.819 17.8517C25.5399 18.1325 25.192 18.335 24.81 18.439C23.21 18.871 16.881 18.967 14.581 18.967C12.281 18.967 5.958 18.867 4.351 18.439C3.96864 18.3341 3.62053 18.1307 3.34149 17.849C3.06246 17.5673 2.86228 17.2173 2.761 16.834C2.39865 14.776 2.22294 12.6896 2.236 10.6C2.22293 8.51006 2.39898 6.42322 2.762 4.365C2.86368 3.98241 3.06407 3.63325 3.34311 3.35245C3.62216 3.07165 3.97006 2.86908 4.352 2.765C5.952 2.333 12.28 2.237 14.581 2.237C16.882 2.237 23.205 2.337 24.811 2.765C25.1928 2.86914 25.5405 3.07175 25.8194 3.35255C26.0983 3.63335 26.2985 3.98249 26.4 4.365V4.365C26.7622 6.4233 26.9375 8.51012 26.924 10.6C26.9381 12.6912 26.7627 14.7794 26.4 16.839V16.839Z" fill="currentColor"/>
							<path d="M17.529 8.551L14.723 6.44C14.2815 6.10508 13.7432 5.92259 13.189 5.92H13.184C12.5215 5.92014 11.8843 6.17465 11.404 6.631C11.1509 6.87031 10.9493 7.15884 10.8118 7.47886C10.6742 7.79889 10.6035 8.14366 10.604 8.492V12.715C10.6032 13.0635 10.6737 13.4085 10.8113 13.7288C10.9489 14.049 11.1506 14.3377 11.404 14.577C11.8843 15.0328 12.5209 15.2872 13.183 15.288H13.189C13.7426 15.2848 14.2803 15.1028 14.722 14.769L17.528 12.657C17.8462 12.4176 18.1044 12.1075 18.2823 11.7513C18.4601 11.395 18.5527 11.0022 18.5527 10.604C18.5527 10.2058 18.4601 9.81304 18.2823 9.45674C18.1044 9.10045 17.8462 8.79038 17.528 8.551H17.529ZM12.48 8.494C12.4782 8.40061 12.4959 8.30788 12.5321 8.22177C12.5682 8.13565 12.622 8.05806 12.69 7.994C12.8232 7.86882 12.9982 7.79755 13.181 7.794V7.794C13.3312 7.79438 13.477 7.84508 13.595 7.938L16.4 10.046C16.4862 10.1113 16.5561 10.1956 16.6042 10.2924C16.6523 10.3892 16.6774 10.4959 16.6774 10.604C16.6774 10.7121 16.6523 10.8187 16.6042 10.9156C16.5561 11.0124 16.4862 11.0967 16.4 11.162L13.6 13.273C13.4821 13.3661 13.3362 13.4168 13.186 13.417V13.417C13.0035 13.4137 12.8287 13.3424 12.696 13.217C12.6276 13.1531 12.5734 13.0756 12.5369 12.9895C12.5004 12.9034 12.4824 12.8105 12.484 12.717L12.48 8.494Z" fill="currentColor"/>
						</svg>
					</a>
					<a href="#" target="_blank" class="text-white transition-colors duration-200 hover:text-blue-300">
						<svg aria-hidden="true" focusable="false" width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1.76544e-07 2.02C-0.0077058 1.74846 0.0432455 1.47845 0.149379 1.22839C0.255512 0.978331 0.41433 0.754103 0.615 0.571002C1.05284 0.179582 1.62626 -0.0253135 2.213 2.25892e-06C2.78765 -0.0256032 3.34923 0.176323 3.776 0.562002C3.97983 0.75561 4.1401 0.990403 4.24614 1.25076C4.35218 1.51112 4.40156 1.79108 4.391 2.072C4.39616 2.33459 4.34531 2.59526 4.24186 2.83665C4.1384 3.07805 3.9847 3.29464 3.791 3.472C3.34972 3.87058 2.76902 4.079 2.175 4.052H2.16C1.87481 4.06469 1.58994 4.02037 1.32208 3.92163C1.05422 3.8229 0.80874 3.67175 0.6 3.477C0.403881 3.28944 0.249182 3.06291 0.145849 2.81198C0.0425151 2.56105 -0.00716571 2.29128 1.76544e-07 2.02V2.02ZM0.228 17.387V5.655H4.128V17.387H0.228ZM6.288 17.387H10.188V10.836C10.1737 10.514 10.2212 10.1921 10.328 9.888C10.4887 9.49423 10.7455 9.14699 11.075 8.878C11.4308 8.59519 11.8758 8.44873 12.33 8.465C13.642 8.465 14.2977 9.349 14.297 11.117V17.387H18.197V10.661C18.2995 9.23868 17.8605 7.83019 16.968 6.718C16.556 6.27219 16.0521 5.92114 15.4911 5.6891C14.9302 5.45705 14.3256 5.34954 13.719 5.374C13.0103 5.35558 12.3096 5.52658 11.689 5.86936C11.0685 6.21215 10.5507 6.7143 10.189 7.324V7.359H10.171L10.189 7.324V5.655H6.289C6.31167 6.03034 6.32333 7.19533 6.324 9.15C6.32467 11.1047 6.31267 13.8503 6.288 17.387V17.387Z" fill="currentColor"/>
						</svg>
					</a>
				</div>
			</div>
		</div>
		<div class="border-t border-white border-opacity-25">
			<div class="container flex flex-col justify-between items-center py-4 sm:flex-row">
			<p class="text-[10px] text-white text-opacity-75 mb-4 md:mb-0">
				© 2022 <strong>Medical SA</strong> All rights reserved <span class="px-1">|</span> <a class="text-white hover:underline" href="#">Privacy Policy</a> <span class="px-1">|</span> <a class="text-white hover:underline" href="#">Cookies</a>
			</p>
			<div class="flex items-center justify-center sm:justify-end">
					<div class="flex-shrink-0">
						<p class="text-[9px] mr-3 text-opacity-80">Developed by</p>
					</div>
					<a href="#" target="_blank"><img src="{!! get_template_directory_uri() !!}/resources/images/logo_hellenic-technologies.svg" width="114" height="53" alt="Hellenic Technologies"></a>
				</div>
			</div>
		</div>
	</footer><!--/.footer -->

    <button class="btn-back-top hidden fixed right-5 bottom-5 bg-white text-gray-100 rounded-lg text-center p-2 hover:bg-slate-100 hover:text-blue-100" type="button">
        <svg aria-hidden="true" focusable="false" width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.5 9.462L8.538 4.573L3.5 9.462" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
            <path d="M8.5 4.683V16.424" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
            <path d="M1 1H16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </button>

	@php ( wp_footer() )

</body>
</html>