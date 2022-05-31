<footer class="page-footer">
    <div class="main-container page-footer__container">
        <div class="page-footer__info">
            <p class="page-footer__info-copyright">
                © 2022, ООО «ТаскФорс»
                Все права защищены
            </p>
            <p class="page-footer__info-use">
                «TaskForce» — это сервис для поиска исполнителей на разовые задачи.
                mail@taskforce.com
            </p>
        </div>
        <div class="page-footer__links">
            <ul class="links__list">
                <li class="links__item">
                    <a href="{{ route('browse.page') }}">Задания</a>
                </li>
                <li class="links__item">
                    <a href="{{ route('account.page') }}">Мой профиль</a>
                </li>
                <li class="links__item">
                    <a href="{{ route('users.page') }}">Исполнители</a>
                </li>
                <li class="links__item">
                    <a href="{{ route('register.page') }}">Регистрация</a>
                </li>
                <li class="links__item">
                    <a href="{{ route('task-create.page') }}">Создать задание</a>
                </li>
            </ul>
        </div>
        <div class="page-footer__copyright">
            <a href="https://htmlacademy.ru">
                <img class="copyright-logo"
                    src="/img/academy-logo.png"
                    width="185" height="63"
                    alt="Логотип HTML Academy">
            </a>
        </div>
    </div>
</footer>