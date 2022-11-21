const pages = [
  { title: "Resource Calculator", url: "resource-calculator" },
  { title: "Speedup Calculator", url: "speedup-calculator" },
  { title: "Troop Calculator", url: "troop-calculator" },
  { title: "Summary", url: "summary" },
  { title: "AP/XP/Officer Calculator", url: "officer-calculator" },
];

const navTab = (pageInfo, active) => `
  <div>
    <a ${active ? "class='active' href='#'" : `href="${pageInfo.url}.html"`}">${pageInfo.title}</a>
  </div>
  `;

const url = window.location.href;
const currentLocation = url.substring(url.lastIndexOf("/") + 1, url.lastIndexOf("."));

const logo = `  
  <a href="index.html">
    <img id="logo" src="images/logo1_50perc.png" alt="logo" />
  </a>
  `;
const links = pages.map((p) => navTab(p, p.url === currentLocation)).join("");

const mobileNavbar = `
  <div class="hamburger-menu">
    <div class="bar top"></div>
    <div class="bar middle"></div>
    <div class="bar bottom"></div>
  </div>
  <div id="mobile-navbar">
    ${links}
  <div>
`;

const navbar = `
  ${logo}
  ${links}
  ${mobileNavbar}
`;

document.getElementById("navbar").innerHTML = navbar;
const hamburger = document.querySelector(".hamburger-menu");
const mobileNav = document.getElementById("mobile-navbar");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  mobileNav.classList.toggle("active");
});
