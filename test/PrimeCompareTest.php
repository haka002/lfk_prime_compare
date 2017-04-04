<?php

use PrimeCompare\PrimeCompare;

class PrimeCompareTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var PrimeCompare
	 */
	private $primeCompare;

	public function setUp()
	{
		parent::setUp();

		$this->primeCompare = new PrimeCompare();
	}

	/**
	 * @param bool $expected
	 * @param int  $number
	 *
	 * @cover PrimeCompare
	 *
	 * @dataProvider isPrimeProvider
	 */
	public function testIsPrime($expected, $number)
	{
		$this->assertEquals($expected, $this->primeCompare->isPrime($number));
	}

	/**
	 * @covers PrimeCompare
	 *
	 * @expectedException InvalidArgumentException
	 */
	public function testIsPrimeInputLessThenTwo()
	{
		$this->primeCompare->isPrime(1);
	}

//	/**
//	 * @cover PrimeCompare
//	 */
//	public function testIsPrimeUnder1000()
//	{
//		for ($i = 3; $i < 1000; $i++)
//		{
//			if (!in_array($i, [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229, 233, 239, 241, 251, 257, 263, 269, 271, 277, 281, 283, 293, 307, 311, 313, 317, 331, 337, 347, 349, 353, 359, 367, 373, 379, 383, 389, 397, 401, 409, 419, 421, 431, 433, 439, 443, 449, 457, 461, 463, 467, 479, 487, 491, 499, 503, 509, 521, 523, 541, 547, 557, 563, 569, 571, 577, 587, 593, 599, 601, 607, 613, 617, 619, 631, 641, 643, 647, 653, 659, 661, 673, 677, 683, 691, 701, 709, 719, 727, 733, 739, 743, 751, 757, 761, 769, 773, 787, 797, 809, 811, 821, 823, 827, 829, 839, 853, 857, 859, 863, 877, 881, 883, 887, 907, 911, 919, 929, 937, 941, 947, 953, 967, 971, 977, 983, 991, 997]))
//			{
//				$this->assertEquals(false, $this->primeCompare->isPrime($i));
//			}
//			else
//			{
//				$this->assertEquals(true, $this->primeCompare->isPrime($i));
//			}
//
//		}
//	}

	/**
	 * @param array $expected
	 * @param int   $number
	 *
	 * @covers PrimeCompare
	 *
	 * @dataProvider isAllCombinationProvider
	 */
	public function testIsAllCombination(array $expected, $number)
	{
		$this->assertEquals($expected, $this->primeCompare->getAllCombination($number));
	}

	/**
	 * @return array
	 */
	public function isPrimeProvider()
	{
		return [
			[false, 4],
			[true, 3],
			[true, 5],
			[false, 6],
			[true, 7],
			[false, 8]
		];
	}

	/**
	 * @return array
	 */
	public function isAllCombinationProvider()
	{
		return [
			[[1], 1],
			[[1,0,10], 10],
			[[2,1,0,21,20,10,210], 210],
			[[3,2,1,0,32,31,30,21,20,10,3210], 3210],
		];
	}
}
