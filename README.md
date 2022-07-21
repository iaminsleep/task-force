# Cервис для поиска исполнителей на разовые задачи «TaskForce»

Проект от HTML Academy (вёрстка), функционал которого был реализован с помощью php-фреймворка Laravel

## Кратко о функционале

Пользователь (заказчик) создаёт задание и назначает на него свою цену за выполнение, другие пользователи (исполнители) могут откликнуться и назначить свою цену. Внимательно изучив каждый отклик, заказчик выбирает исполнителя на эту задачу. Они обсуждают все детали и вопросы с помощью мессенджера. В любое время пользователь может отказаться от выполнения задачи, при этом его рейтинг будет снижен. В случае выполнения заказчик закрывает задание и оценивает качество работы исполнителя, от его оценки и будет зависеть текущий рейтинг исполнителя.

## Особенности

- возможность создать задание и назначить исполнителя
- встроенный мессенджер к каждому заданию (появляется когда назначают исполнителя)
- система уведомлений
- обширный фильтр заданий и пользователей
- у каждого пользователя есть свой рейтинг
- 4 вида статусов у задания - "Активно", "Завершено", "Отменено", "Просрочено"
- возможность прикрепления файлов к заданию и их скачивания из сервера
- настройка пользователя, возможность добавления доп. данных или отключения уведомлений по желанию
- система онлайн статуса у пользователей
- возможность добавления пользователя в избранное
- подключение Яндекс.Карт на странице тех заданий, где указан адрес

## Технологии

- Laravel 8
- MySQL
- VueJS
- html
- css
- js

## Хостинг

Сервис размещён на хостинге от Heroku<br>
http://taskforce-github.herokuapp.com/
