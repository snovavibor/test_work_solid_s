<?php


/**
 * для обработки данных полученных из формы
 * и дальнейшей отправки в Model::create()
 * для формирования подготовленного запроса sql in execute
 * получаем массив из значений полей
 */
interface MakeValueInterface
{
    public function makeValueforCreate($param);
}