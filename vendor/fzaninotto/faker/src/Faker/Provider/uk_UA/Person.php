<?php

namespace Faker\Provider\uk_UA;

class Person extends \Faker\Provider\Person
{
    protected static $maleNameFormats = array('{{firstNameMale}} {{middleName}} {{lastName}}', '{{lastName}} {{firstNameMale}} {{middleName}}');
    protected static $femaleNameFormats = array('{{lastName}} {{firstNameFemale}} {{middleName}}', '{{firstNameFemale}} {{middleName}} {{lastName}}');
    protected static $firstNameMale = array('Євген', 'Адам', 'Олександр', 'Олексій', 'Анатолій', 'Андрій', 'Антон', 'Артем', 'Артур', 'Борис', 'Вадим', 'Валентин', 'Валерій', 'Василь', 'Віталій', 'Володимир', 'Владислав', 'Геннадій', 'Георгій', 'Григорій', 'Данил', 'Данило', 'Денис', 'Дмитро', 'Євген', 'Іван', 'Ігор', 'Йосип', 'Кирил', 'Костянтин', 'Лев', 'Леонід', 'Максим', 'Мирослав', 'Михайло', 'Назар', 'Микита', 'Микола', 'Олег', 'Павло', 'Роман', 'Руслан', 'Сергій', 'Станіслав', 'Тарас', 'Тимофій', 'Федір', 'Юрій', 'Ярослав', 'Богдан', 'Болеслав', 'B\'ячеслав', ' Bалерій', ' Bсеволод', ' Bіктор', 'Ілля');
    protected static $firstNameFemale = array('Олександра', 'Олена', 'Алла', 'Анастасія', 'Анна', 'Валентина', 'Валерія', 'Віра', 'Вікторія', 'Галина', 'Дар\'я', 'Діана', 'Євгенія', 'Катерина', 'Олена', 'Єлизавета', 'Інна', 'Ірина', 'Катерина', 'Кіра', 'Лариса', 'Любов', 'Людмила', 'Маргарита', 'Марина', 'Марія', 'Надія', 'Наташа', 'Ніна', 'Оксана', 'Ольга', 'Поліна', 'Раїса', 'Світлана', 'Софія', 'Тамара', 'Тетяна', 'Юлія', 'Ярослава');
    protected static $middleName = array('Олександрович', 'Олексійович', 'Андрійович', 'Євгенович', 'Сергійович', 'Іванович', 'Федорович', 'Тарасович', 'Васильович', 'Романович', 'Петрович', 'Миколайович', 'Борисович', 'Йосипович', 'Михайлович', 'Валентинович', 'Янович', 'Анатолійович', 'Євгенійович', 'Володимирович');
    protected static $lastName = array('Антоненко', 'Василенко', 'Васильчук', 'Васильєв', 'Гнатюк', 'Дмитренко', 'Захарчук', 'Іванченко', 'Микитюк', 'Павлюк', 'Панасюк', 'Петренко', 'Романченко', 'Сергієнко', 'Середа', 'Таращук', 'Боднаренко', 'Броваренко', 'Броварчук', 'Кравченко', 'Кравчук', 'Крамаренко', 'Крамарчук', 'Мельниченко', 'Мірошниченко', 'Шевченко', 'Шевчук', 'Шинкаренко', 'Пономаренко', 'Пономарчук', 'Лисенко');
    /**
     * Return middle name
     * @example 'Іванович'
     * @access public
     * @return string Middle name
     */
    public function middleName()
    {
        return static::randomElement(static::$middleName);
    }
}

?>