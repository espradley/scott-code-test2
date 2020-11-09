<?php
namespace Gorilla\Contact\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * Class ExportContacts
 */
class ExportContacts extends Command
{

    protected $_directory;

    protected $_contactFactory;

    /**
     * ExportContacts constructor.
     *
     * @param \Magento\Framework\Filesystem $filesystem
     * @param \Gorilla\Contact\Model\ContactFactory $contactFactory
     */
    public function __construct(
        \Magento\Framework\Filesystem $filesystem,
        \Gorilla\Contact\Model\ContactFactory $contactFactory
    ) {
        parent::__construct();
        $this->_directory = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);;
        $this->_contactFactory = $contactFactory;
    }
    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('gorilla:export:contacts')
            ->setDescription('Export Contacts');

        parent::configure();
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = 'export/contacts-' . date('Y-m-d--H-i-s') . '.csv';
        $output->writeln('<info>Exporting contacts to: ' . $filePath . '</info>');

        $this->_directory->create('export');
        $stream = $this->_directory->openFile($filePath, 'w+');
        $stream->lock();

        $header = ['ID', 'First Name', 'Last Name', 'Email', 'Created At'];
        $stream->writeCsv($header);

        $collection = $this->_contactFactory->create()->getCollection();
        foreach ($collection as $contact) {
            $data = [];
            $data[] = $contact->getEntityId();
            $data[] = $contact->getFirstName();
            $data[] = $contact->getLastName();
            $data[] = $contact->getEmail();
            $data[] = $contact->getTime();
            $stream->writeCsv($data);
        }

        $output->writeln('<info>Export complete!</info>');
    }
}
