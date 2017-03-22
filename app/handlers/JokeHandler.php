<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package jokes
 */
namespace app\handlers;

class JokeHandler
{
    protected $jokes = [
        [
            'question' => 'Where do animals go when their tails fall off?',
            'answer' => 'The retail store.'
        ],
        [
            'question' => 'What do you call a cow with no legs?',
            'answer' => 'Ground beef.'
        ],
        [
            'question' => 'What does Batman get in his drinks?',
            'answer' => 'Just ice.'
        ],
        [
            'question' => 'What did the buffalo say to his son when he left for college?',
            'answer' => 'Bison.'
        ],
        [
            'question' => 'Why can’t you hear a pterodactyl going to the bathroom?',
            'answer' => 'Because the P is silent.'
        ],
        [
            'question' => 'What is the difference between a snowman and a snowwoman?',
            'answer' => 'Snowballs.'
        ],
        [
            'question' => 'What computer sings the best?',
            'answer' => 'A dell.'
        ],
        [
            'question' => 'How many programmers does it take to change a light bulb?',
            'answer' => 'None. It\'s a hardware problem.'
        ]
    ];

    /**
     * Shows the a joke and the answer in a view
     */
    public function index()
    {
        // Shuffle jokes so a random shows everytime
        $joke = shuffle($this->jokes);
        $joke = $this->jokes[0];

        // Return the view
        include dirname(__FILE__).'/../views/index.php';
    }

    /**
     * The joke api that returns jokes based off count
     *
     * @param array $params An array of GET parameters
     *
     * @return string The json formatted jokes
     */
    public function api($params = ['count' => 1])
    {
        // Shuffle the array
        shuffle($this->jokes);

        header('Content-type: application/json');
        echo json_encode(array_slice($this->jokes, 0, $params['count']));
    }
}
