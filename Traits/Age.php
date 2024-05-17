<?php
trait Age{
    protected $age;

    public function getAge() {
        return $this->age;
    }

    public function setAge($newAge) {
        $this->age = $newAge;
    }
}
?>