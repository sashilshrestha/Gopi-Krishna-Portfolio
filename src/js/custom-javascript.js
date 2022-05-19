// Add your JS customizations here
import "./custom-slick";

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
