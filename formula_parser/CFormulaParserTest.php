<?php

class CConditionValidatorTest extends PHPUnit_Framework_TestCase {

	public function invalidCompareSeveralTriggersWithAndProvider()
	{
		return [
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'B',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A and B'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'C',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A and B or C'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A and B or C and D'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => '(A or B) and (C or D)'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_MAINTENANCE,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TEMPLATE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'E',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'F',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A and B and ((C or D) and (E or F))'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_MAINTENANCE,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TEMPLATE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'E',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'F',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A and (B or C) or D and (E or F)'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_MAINTENANCE,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TEMPLATE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'E',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'F',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'G',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'H',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A and (B or C) or D and ((E or F) and (G or H))'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TEMPLATE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'E',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A and (B or (C and (D or E)))'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_MAINTENANCE,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TEMPLATE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_AND,
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'E',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => '(A and B) or (C and D) and E'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'E',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => '(A and B) or (C or D) and E'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'E',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'F',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => '(A and B) or (C and (D or E)) and F'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'E',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'F',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'G',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => '(A and B) or ((C and D) or (E and F)) and G'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'E',
						],
						[
							'conditiontype' => CONDITION_TYPE_TEMPLATE,
							'formulaid' => 'F',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => '(A and B) or (C and (D or (E and F)))'
				]
			]
		];
	}

	public function validCompareSeveralTriggersProvider()
	{
		return [
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'B',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A or B'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'C',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A or B and C'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A or B or C or D'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => '(A and B) or (C and D)'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_MAINTENANCE,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TEMPLATE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'E',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'F',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A and B and ((C and D) or (E and F))'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_MAINTENANCE,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TEMPLATE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'E',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'F',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A and (B or C) and (D or E or F)'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_MAINTENANCE,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TEMPLATE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'E',
						],
						[
							'conditiontype' => CONDITION_TYPE_HOST,
							'formulaid' => 'F',
						],
						[
							'conditiontype' => CONDITION_TYPE_EVENT_TYPE,
							'formulaid' => 'G',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'H',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_EXPRESSION,
					'formula' => 'A and (B or C) and (D or ((E or F) and (G or H)))'
				]
			],
			[
				[
					'conditions' => [
						[
							'conditiontype' => CONDITION_TYPE_MAINTENANCE,
							'formulaid' => 'A',
						],
						[
							'conditiontype' => CONDITION_TYPE_TEMPLATE,
							'formulaid' => 'B',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'C',
						],
						[
							'conditiontype' => CONDITION_TYPE_TRIGGER,
							'formulaid' => 'D',
						]
					],
					'evaltype' => CONDITION_EVAL_TYPE_OR,
				]
			]
		];
	}

	/**
	 * @dataProvider invalidCompareSeveralTriggersWithAndProvider
	 */
	public function testInvalidComparingSeveralTriggersWithAnd($object) {
		$conditionValidator = new CConditionValidator();

		$result = $conditionValidator->validate($object);

		$this->assertSame($result, false);
	}

	/**
	 * @dataProvider validCompareSeveralTriggersProvider
	 */
	public function testValidComparingSeveralTriggersWithAnd($object) {
		$conditionValidator = new CConditionValidator();

		$result = $conditionValidator->validate($object);

		$this->assertSame($result, true);
	}
}
