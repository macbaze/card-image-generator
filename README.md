# Генератор изображений банковских карт :credit_card:
____
Развёрнутая версия генератора [здесь](http://macbaze.tmweb.ru/card-image-generator/index.html)\
Основное предназначение таких изображений - облегчение переводов физическим лицам по номеру карты из банковских приложений.\
В банковских приложениях сейчас доступно несколько вариантов переводов физическим лицам:
- по номеру счёта (_долго, легко ошибиться. В большинстве случаев при переводе между физ.лицами не используется из-за большего времени перечисления средств и необходимости заполнения реквизитов_);
- по номеру телефона (_быстро, сложно ошибиться. Удобный способ, но отправителю необходимо знать номер телефона получателя, что не всегда приемлемо_);
- по QR-коду (_быстро, почти невозможно ошибиться. Удобный способ, но, увы, доступный далеко не во всех приложениях_);
- по номеру карты:
    - ввод вручную (_долго, легко ошибиться_);
    - считывание с помощью NFC (_быстро, почти невозможно ошибиться. Необходима карта получателя. Доступно не во всех приложениях_);
    - сканирование с помощью камеры (_быстро, почти невозможно ошибиться. Необходима карта или изображение карты_).

Последний из перечисленных способов поддерживается приложениями крупнейших банков, но при сканировании карты могут возникнуть сложности: чаще всего если номер трудночитаем (краска на цифрах стирается при длительном пользовании картой). На лицевой стороне также нанесён срок действия, раскрытие которого нежелательно.\
Генератор размещает номер карты на одноцветной подложке в пропорциях настоящей карты. Полученные изображения могут быть распечатаны или отсканированы прямо с экрана.
