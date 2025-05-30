window.addEventListener("DOMContentLoaded", () => {
  const loadComponent = (id, url) => {
    fetch(url)
      .then((res) => res.text())
      .then((data) => {
        document.getElementById(id).innerHTML = data;
      });
  };

  loadComponent("header", "components/header.html");
  loadComponent("footer", "components/footer.html");
});
