<?php
    namespace App;

    class Cart{
        // method
        public $inventaris = null;
        public $totalQty = 0;

        // function construct
        public function __construct($oldCart){
            if ($oldCart) {
                $this->inventaris = $oldCart->inventaris;
                $this->totalQty = $oldCart->totalQty;
            }
        }

        public function add($dataInven, $id){
            $storedInventaris = ['qty' => 0, 'dataInven' => $dataInven];
            if ($this->inventaris) {
                if (array_key_exists($id, $this->inventaris)) {
                    $storedInventaris = $this->inventaris[$id];
                }
            }

            $storedInventaris['qty']++;
            $this->inventaris[$id] = $storedInventaris;
            $this->totalQty++;

        }
    }
?>