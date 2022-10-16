<?php
declare(strict_types=1);

namespace Granah\Shared\Infrastructure\Doctrine;


use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Schema\MySqlSchemaManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver;
use Doctrine\ORM\Tools\Setup;
use Granah\Shared\Infrastructure\Doctrine\Dbal\DbalCustomTypesRegistrar;
use RuntimeException;
use function Lambdish\Phunctional\dissoc;

final class DoctrineEntityManagerFactory
{
    private static array $sharedPrefixes = [
        __DIR__ . '/../../../Shared/Infrastructure/Persistence/Mappings' => 'Granah\Shared\Domain',
    ];

    public static function create(
        array  $parameters,
        array  $contextPrefixes,
        bool   $isDevMode,
        string $schemaFile,
        array  $dbalCustomTypesClasses
    ): EntityManagerInterface
    {
        if ($isDevMode) {
            self::generateDatabaseIfNotExists($parameters, $schemaFile);
        }

        DbalCustomTypesRegistrar::register($dbalCustomTypesClasses);

        return EntityManager::create($parameters, self::createConfiguration($contextPrefixes, $isDevMode));
    }

    private static function generateDatabaseIfNotExists(array $parameters, string $schemaFile): void
    {
        self::ensureSchemaFileExists($schemaFile);

        $databaseName = $parameters['dbname'];
        $parametersWithoutDatabaseName = dissoc($parameters, 'dbname');
        $connection = DriverManager::getConnection($parametersWithoutDatabaseName);
        $schemaManager = new MySqlSchemaManager($connection);

        if (!self::databaseExists($databaseName, $schemaManager)) {
            $schemaManager->createDatabase($databaseName);
            $connection->executeQuery(sprintf('USE %s', $databaseName));
            $connection->executeQuery(file_get_contents(realpath($schemaFile)));
        }

        $connection->close();
    }

    private static function ensureSchemaFileExists(string $schemaFile): void
    {
        if (!file_exists($schemaFile)) {
            throw new RuntimeException(sprintf('The file <%s> does not exist', $schemaFile));
        }
    }

    private static function databaseExists($databaseName, MySqlSchemaManager $schemaManager): bool
    {
        return in_array($databaseName, $schemaManager->listDatabases(), true);
    }

    private static function createConfiguration(array $contextPrefixes, bool $isDevMode): Configuration
    {
        $config = Setup::createConfiguration($isDevMode, null, null);

        $config->setMetadataDriverImpl(new SimplifiedXmlDriver(array_merge(self::$sharedPrefixes, $contextPrefixes)));

        return $config;
    }
}