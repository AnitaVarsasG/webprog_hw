<section class="contact-header">
    <h2>Kapcsolat</h2>
    <p>
        Ha kérdésed van a tanösvényekkel, nemzeti parkokkal vagy az oldalon található adatokkal kapcsolatban,
        küldj üzenetet az oldal tulajdonosának.
    </p>
</section>

<section class="contact-box">
    <h3>Üzenet küldése</h3>

    <div id="jsHibak" class="error-message" style="display: none;"></div>

    <form id="kapcsolatForm" action="kapcsolat_elkuldve" method="post">
        <div class="form-row">
            <label for="nev">Név:</label>
            <input type="text" id="nev" name="nev">
        </div>

        <div class="form-row">
            <label for="email">E-mail cím:</label>
            <input type="text" id="email" name="email">
        </div>

        <div class="form-row">
            <label for="targy">Tárgy:</label>
            <input type="text" id="targy" name="targy">
        </div>

        <div class="form-row">
            <label for="uzenet">Üzenet:</label>
            <textarea id="uzenet" name="uzenet" rows="7"></textarea>
        </div>

        <button type="submit">Üzenet küldése</button>
    </form>
</section>