<?php

namespace PrimeCompare;

use InvalidArgumentException;

class PrimeCompare
{
	/**
	 * @param int $number
	 *
	 * @return bool
	 */
	public function isPrime($number)
	{
		if ($number < 2)
		{
			throw new InvalidArgumentException(
				sprintf('The numberString (%s) must be greater then 2', $number)
			);
		}

		for ($i = 2; $i <= $number / 2; $i++)
		{
			if ($number % $i == 0)
			{
				return false;
			}
		}

		return  true;
	}

	/**
	 * @param int $number
	 *
	 * @return array
	 */
	public function getAllCombination($number)
	{
		$numberList      = [];
		$combinationList = [];
		$numberString    = (string)$number;

		for ($i = 0; $i < strlen($numberString); $i++)
		{
			$numberList[]      = (int)$numberString[$i];
			$combinationList[] = (int)$numberString[$i];
		}

		if ($number > 99)
		{
			foreach ($numberList as $index => $numberElement)
			{
				for ($j = $index + 1; $j < count($numberList); $j++)
				{
					$combinationList[] = intval((string)$numberElement . (string)$numberList[$j]);
				}
			}
		}

		if ($number > 9)
		{
			$combinationList[] = $number;
		}

		return $combinationList;
	}
}
