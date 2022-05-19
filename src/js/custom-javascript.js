// Add your JS customizations here
import "../../node_modules/slick-carousel/slick/slick";

jQuery(document).ready(function ($) {
	$(".your-class").slick({
		centerMode: true,
		centerPadding: "60px",
		slidesToShow: 3,
		arrows: true,
		infinite: false,
	});
});

const navSlide = () => {
	const burger = document.querySelector(".all-lines");
	const nav = document.querySelector(".nav-links");

	burger.addEventListener("click", () => {
		nav.classList.toggle("nav-active");

		// Burger Animation
		burger.classList.toggle("toggle");
	});
};

navSlide();
