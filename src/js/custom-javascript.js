/* Responsive Navigation Toggling */
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

/* Counter Animation */
const countersNumber = document.querySelectorAll(".counter");

function runCounter() {
	countersNumber.forEach((counter) => {
		counter.innerText = 0;
		let target = +counter.dataset.count;
		let step = target / 100;
		let countIt = function () {
			let displayedCount = +counter.innerText;
			if (displayedCount < target) {
				counter.innerText = Math.ceil(displayedCount + step);
				setTimeout(countIt, 1);
			} else {
				counter.innerText = target + "+";
			}
		};
		countIt();
	});
}

let counterSection = document.querySelector(".about--section--img");

let options = {
	rootMargin: "0px 0px -580px 0px",
};
let done = 0;
const sectionObeserver = new IntersectionObserver(function (entries) {
	if (entries[0].isIntersecting && done !== 1) {
		done = 1;
		runCounter();
	}
}, options);

if (counterSection !== null) {
	sectionObeserver.observe(counterSection);
}
