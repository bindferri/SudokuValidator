<?php

//Example
//$sudoku = [
//[4,3,5,2,6,9,7,8,1],
//[6,8,2,5,7,1,4,9,3],
//[1,9,7,8,3,4,5,6,2],
//[8,2,6,1,9,5,3,4,7],
//[3,7,4,6,8,2,9,1,5],
//[9,5,1,7,4,3,6,2,8],
//[5,1,9,3,2,6,8,7,4],
//[2,4,8,9,5,7,1,3,6],
//[7,6,3,4,1,8,2,5,9]
//];

//Function for 3*3 subgrid validation
function boxValidation($array){
    $row = 0;
    $column = 0;
    for ($i =1;$i<10;$i++){
        for ($j=$row;$j<$row + 3;$j++){
            for ($k=$column;$k<$column+3;$k++){
                $box[] = $array[$j][$k];
            }
        }
        if (count($box) != count(array_unique($box))) return false;
        $box = [];
        $column = $column + 3;
        if ($i % 3 === 0 && $i != 0){
            $row = $row + 3;
            $column = 0;
        }
    }
    return true;
}

//Main function for Sudoku Validation , that should be called
function sudokuValidation($array)
{
    $column = [];
    $row = [];
    for ($i = 0; $i < 9; $i++) {
        for ($j = 0; $j < 9; $j++) {
        if ($array[$i][$j] > 9 || $array[$i][$j] < 1) return false;
        if ($array[$j][$i] > 9 || $array[$j][$i] < 1) return false;
            $row[] = $array[$i][$j];
            $column[] = $array[$j][$i];
        }
        if (!(count($row) === count(array_unique($row))) || !(count($column) === count(array_unique($column)))) {
            return false;
        }
        $column = [];
        $row = [];
    }

    return boxValidation($array);
}
