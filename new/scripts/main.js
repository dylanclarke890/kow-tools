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

const navbar = `
  <a href="index.html">
    <img id="logo" src="images/logo1_50perc.png" alt="logo" />
  </a>
  ${pages.map((p) => navTab(p, p.url === currentLocation)).join("")}
`;

document.getElementById("navbar").innerHTML = navbar;
