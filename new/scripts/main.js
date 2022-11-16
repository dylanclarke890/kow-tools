const pages = [
  { title: "Resource Calculator", url: "resource-calculator" },
  { title: "Speedup Calculator", url: "speedup-calculator" },
  { title: "Troop Calculator", url: "troop-calculator" },
  { title: "Summary", url: "summary" },
  { title: "AP/XP/Officer Calculator", url: "officer-calculator" },
];

const navTab = (pageInfo, active) => `
    <li class="nav-item">
      <a class="nav-link${active ? ' active" href="#wrapper"' : `" href="${pageInfo.url}.html"`}">${
  pageInfo.title
}</a>
    </li>
  `;

const url = window.location.href;
const currentLocation = url.substring(url.lastIndexOf("/") + 1, url.lastIndexOf("."));
const navbar = `
    <nav id="banner" class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid" id="menu">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.html">
        <img id="logo" src="images/logo1_50perc.png" alt="logo" />
      </a>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul id="menuList" class="nav navbar-nav justify-content-center">
        ${pages.map((p) => navTab(p, p.url === currentLocation)).join("")}
        </ul>
      </div>
    </div>
  </nav>
  `;

document.getElementById("navbarTarget").innerHTML = navbar;
