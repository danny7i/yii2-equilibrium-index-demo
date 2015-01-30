<?php
/**
 * @package motortrak
 * @author Danxi Song <ourlaputa@msn.com>
 */

namespace app\services;


use yii\web\BadRequestHttpException;

class EquilibriumIndexService {


    public function calculate(array $in, $isStrict = false) {
        $wholeSum = 0;
        $leftSum = 0;

        $array = [];
        foreach ($in as $number) {
            if (is_numeric(trim($number))) {
                $wholeSum += $number;
                $array[] = $number;
            } elseif ($isStrict === true) {
                throw new BadRequestHttpException('All elements must be numeric.');
            }
        }

        // if the sum of all elements are zero, then the last index is also the equilibrium index
        $indice = [$wholeSum == 0 ? count($array) -1 : -1];

        foreach ($array as $i => $number) {
            $wholeSum -= $number;

            if ($leftSum == $wholeSum) {
                // already found an index, now we found the second one
                if (count($indice) == 1 && $indice[0] == -1) {
                    $indice[0] = $i;
                } else {
                    $indice[] = $i;
                }
            }

            $leftSum += $number;
        }
        sort($indice);
        return count($indice) > 1 ? array_unique($indice) : $indice[0];
    }
}