<?php

namespace Eduardtrayan\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PrintArrayCommand extends Command
{
    private $toPrintHeader = array(
        'Name',
        'Color',
        'Element',
        'Likes',
    );

    private $toPrintBody = array(
        array(
            'Name' => 'Trixie',
            'Color' => 'Green',
            'Element' => 'Earth',
            'Likes' => 'Flowers',
        ),
        array(
            'Name' => 'Tinkerbell',
            'Element' => 'Air',
            'Likes' => 'Singning',
            'Color' => 'Blue',
        ),
        array(
            'Element' => 'Water',
            'Likes' => 'Dancing',
            'Name' => 'Blum',
            'Color' => 'Pink',
        ),
    );

    /** {@inheritdoc} */
    protected function configure()
    {
        $this
            ->setName('array:print')
            ->setDescription('Prints custom array as table');
    }

    /** {@inheritdoc} */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $table = new Table($output);
        $table
            ->setHeaders($this->toPrintHeader)
            ->setRows($this->normalizeToPrint());

        $table->render($output);
    }

    /**
     * @return array
     */
    private function normalizeToPrint()
    {
        $body = $this->toPrintBody;
        $header = $this->toPrintHeader;

        $normalizedBody = array();

        foreach ($body as $row) {
            $normalizedBodyElement = array();

            foreach ($header as $headerElement) {
                $normalizedBodyElement[$headerElement] = $row[$headerElement];
            }

            $normalizedBody[] = $normalizedBodyElement;
        }

        return $normalizedBody;
    }
}
