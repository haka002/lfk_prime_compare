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
		$combinationList = [];
		$numberString    = (string)$number;

		for ($i = 0; $i < strlen($numberString); $i++)
		{
			for ($j = 0; $j < strlen($numberString); $j++)
			{
				$nextElement = $i + $j;

				if (!isset($numberString[$nextElement]))
				{
					break;
				}

				$combinationList[] = (int)substr($numberString, $j, $i + 1);
			}
		}

		return $combinationList;
	}

	/**
	 * @param int $number
	 *
	 * @return int
	 */
	public function getTheHighestPrime($number)
	{
		if ($number < 2)
		{
			throw new InvalidArgumentException(
				sprintf('The numberString (%s) must be greater then 2', $number)
			);
		}

		$highestPrime = 0;

		foreach ($this->getAllCombination($number) as $combination)
		{
			if (
				$combination > 1
				&& $this->isPrime($combination)
				&& $combination > $highestPrime
			) {
				$highestPrime = $combination;
			}
		}

		if ($highestPrime == 0)
		{
			throw new InvalidArgumentException('The number doesn\'t contains any prime!');
		}

		return $highestPrime;
	}
}
