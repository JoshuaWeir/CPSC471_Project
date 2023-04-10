<?php
class Credit {
    private $id;
    private $value;

    // Constructor

    public function Credit(&$id, &$value) {
        $this->id = $id;
        $this->value = $value;
    }
    // Getters and Setters

    public function getId() {
        return $this->id;
    }

    public function setId(&$id) {
        $this->id = $id;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue(&$value) {
        $this->value = $value;
    }
}
?>
