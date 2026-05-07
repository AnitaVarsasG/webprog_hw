document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("kapcsolatForm");
  const hibakDoboz = document.getElementById("jsHibak");

  if (!form || !hibakDoboz) {
    return;
  }

  form.addEventListener("submit", function (event) {
    const hibak = [];

    const nev = document.getElementById("nev").value.trim();
    const email = document.getElementById("email").value.trim();
    const targy = document.getElementById("targy").value.trim();
    const uzenet = document.getElementById("uzenet").value.trim();

    const emailMinta = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (nev === "") {
      hibak.push("A név megadása kötelező.");
    } else if (nev.length < 3) {
      hibak.push("A név legalább 3 karakter hosszú legyen.");
    }

    if (email === "") {
      hibak.push("Az e-mail cím megadása kötelező.");
    } else if (!emailMinta.test(email)) {
      hibak.push("Az e-mail cím formátuma nem megfelelő.");
    }

    if (targy === "") {
      hibak.push("A tárgy megadása kötelező.");
    } else if (targy.length < 3) {
      hibak.push("A tárgy legalább 3 karakter hosszú legyen.");
    }

    if (uzenet === "") {
      hibak.push("Az üzenet megadása kötelező.");
    } else if (uzenet.length < 10) {
      hibak.push("Az üzenet legalább 10 karakter hosszú legyen.");
    }

    if (hibak.length > 0) {
      event.preventDefault();

      hibakDoboz.innerHTML = hibak
        .map(function (hiba) {
          return "<p>" + hiba + "</p>";
        })
        .join("");

      hibakDoboz.style.display = "block";
    } else {
      hibakDoboz.style.display = "none";
    }
  });
});
