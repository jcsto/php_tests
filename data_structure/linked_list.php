<?php

    function insert($head,$data){
        if ($head == null)
            $head = new Node($data);
        else {
            $tmp = $head;
            while ($tmp->next != null) {
                $tmp = $tmp->next;
            }
            $aux = new Node($data);
            $tmp->next = $aux;
            $head->next = $tmp->next;
            #var_dump($tmp);
        }
        return $head;
    }
