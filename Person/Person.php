<?php

class Person
{
    private string $name;
    private string $lastname;
    private int $age;
    // private int $hp;
    private ?Person $mother;
    private ?Person $father;

    function __construct(
        string $name,
        string $lastname,
        int $age,
        ?Person $mother = null,
        ?Person $father = null,
    ) {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->age = $age;
        $this->mother = $mother;
        $this->father = $father;
        //$this->hp = 100;
    }

    // public function sayHi(string $name): string
    // {
    //     return "Hi, $name, I`m " . $this->name;
    // }

    // public function setHp(int $hp)
    // {
    //     if ($this->hp + $hp > 100) {
    //         $this->hp = 100;
    //     } else {
    //         $this->hp = $this->hp + $hp;
    //     }
    // }

    // public function getHp(): int
    // {
    //     return $this->hp;
    // }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getMother(): ?Person
    {
        return $this->mother;
    }

    public function getFather(): ?Person
    {
        return $this->father;
    }

    public function getInfo(): string
    {
        return
            <<<RESULT
<h3>Пару слов обо мне и моей родне:</h3><br>
Меня зовут: {$this->getName()}<br>
Моя фамилия: {$this->getLastname()}<br>
Мою маму зовут: {$this->getMother()?->getName()}<br>
Фамилия моей мамы: {$this->getMother()?->getLastname()}<br>
Моего папу зовут: {$this->getFather()?->getName()}<br>
Фамилия моего папы: {$this->getFather()?->getLastname()}<br>
Мою бабушку, мамину маму зовут: {$this->getMother()->getMother()->getName()}<br>
Фамилия моей бабушки: {$this->getMother()->getMother()->getLastname()}<br>
Моего дедушку, маминого папу зовут: {$this->getMother()->getFather()->getName()}<br>
Фамилия моего дедушки: {$this->getMother()->getFather()->getLastname()}<br>
Мою бабушку, папину маму зовут: {$this->getFather()->getMother()->getName()}<br>
Фамилия моей бабушки: {$this->getFather()->getMother()->getLastname()}<br>
Моего дедушку, папиного папу зовут: {$this->getFather()->getFather()->getName()}<br>
Фамилия моего дедушки: {$this->getFather()->getFather()->getLastname()}
RESULT;
    }
}

$igor = new Person("Igor", "Petrov", 68);
$alla = new Person("Alla", "Petrova", 68);

$egor = new Person("Egor", "Ivanov", 70);
$inna = new Person("Inna", "Ivanova", 70);

$alex = new Person("Alex", "Ivanov", 42, $inna, $egor);
$olga = new Person("Olga", "Ivanova", 42, $alla, $igor);
$valera = new Person("Valera", "Ivanov", 14, $olga, $alex);

echo $valera->getInfo();
// echo $valera->getMother()->getFather()->getName();


//! Здоровье человека не может быть более 100 ед.

// $medKit = 50;
// $alex->setHp(-30); //? Упал
// echo $alex->getHp() . "<br>";
// $alex->setHp($medKit); //? Нашел аптечку
// echo $alex->getHp();


// echo $alex->sayHi($igor->name);
// echo "<hr>" . $igor->sayHi($alex->name);
