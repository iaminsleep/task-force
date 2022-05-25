<section class="modal completion-form form-modal" id="complete-form">
<h2>Завершение задания</h2>
    <p class="form-modal-description">Задание выполнено?</p>
    <form action="#" method="post">
    <input class="visually-hidden completion-input completion-input--yes" type="radio" id="completion-radio--yes" name="completion" value="yes">
<label class="completion-label completion-label--yes" for="completion-radio--yes">Да</label>
    <input class="visually-hidden completion-input completion-input--difficult" type="radio" id="completion-radio--yet" name="completion" value="difficulties">
<label  class="completion-label completion-label--difficult" for="completion-radio--yet">Возникли проблемы</label>
    <p>
        <label class="form-modal-description" for="completion-comment">Комментарий</label>
        <textarea class="input textarea" rows="4" id="completion-comment" name="completion-comment" placeholder="Place your text"></textarea>
    </p>
    <p class="form-modal-description">
        Оценка
        <div class="feedback-card__top--name completion-form-star">
            <span class="star-disabled"></span>
            <span class="star-disabled"></span>
            <span class="star-disabled"></span>
            <span class="star-disabled"></span>
            <span class="star-disabled"></span>
        </div>
    </p>
    <input type="hidden" name="rating" id="rating">
        <button class="button modal-button" type="submit">Отправить</button>
    </form>
    <button class="form-modal-close" type="button">Закрыть</button>
</section>