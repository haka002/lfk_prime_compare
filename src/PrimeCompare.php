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
		$numberString = (string)$number;

		for ($i = strlen($numberString) - 1; $i >= 0; $i--)
		{
			for ($j = 0; $j < strlen($numberString); $j++)
			{
				$nextElement = $i + $j;

				if (isset($numberString[$nextElement]))
				{
					$combination = (int)substr($numberString, $j, $i + 1);

					if (
						$combination > 1
						&& $this->isPrime($combination)
						&& $combination > $highestPrime
					) {
						$highestPrime = $combination;
					}
				}
			}

			// If we have highest prime here, we have found the it!
			if ($highestPrime != 0)
			{
				break;
			}
		}

		if ($highestPrime == 0)
		{
			throw new InvalidArgumentException('The number doesn\'t contains any prime!');
		}

		return $highestPrime;
	}
}
