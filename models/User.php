<?php 
class User { 
    private $Location;
    private $PickUp;
    private $PickUpTime;
    private $DropOf;
    private $DropOfTime;
    public function __construct($Location,$PickUp,$PickUpTime,$DropOf,$DropOfTime) {
        $this->Location = $Location;
        $this->PickUp= $PickUp;
        $this->PickUpTime = $PickUpTime;
        $this->DropOf = $DropOf;
        $this->DropOfTime= $DropOfTime; 
    } 
    public function getLocation(): string {
        return $this->Location ?? '';
    } 
    public function setLocation(string $Location) {
        $this->Location = $Location;
    }

    public function getPickUp() {
        return $this->PickUp;
    }

    public function setPickUp($PickUp) {
        $this->PickUp = $PickUp;
    }

    public function getPickUpTime() {
        return $this->PickUpTime;
    } 
    public function setPickUpTime($PickUpTime) {
        $this->PickUpTime = $PickUpTime;
    } 
    public function getDropOf() {
        return $this->DropOf;
    } 
    public function setDropOf($DropOf) {
        $this->DropOf = $DropOf;
    }

    public function getDropOfTime() {
        return $this->DropOfTime;
    } 
    public function setDropOfTime($DropOfTime) {
        $this->DropOfTime = $DropOfTime;
    } 
    public function saveToSession() {
        $_SESSION['user'] = [
            'Location' => $this->Location,
            'PickUp' => $this->PickUp,
            'PickUpTime' => $this->PickUpTime,
            'DropOf' => $this->DropOf,
            'DropOfTime' => $this->DropOfTime,
        ]; 
    } 
    public function Prix() {
        $_SESSION['user'] = [
            'Location' => $this->Location,
            'PickUp' => $this->PickUp,
            'PickUpTime' => $this->PickUpTime,
            'DropOf' => $this->DropOf,
            'DropOfTime' => $this->DropOfTime,
        ]; 
    } 
}