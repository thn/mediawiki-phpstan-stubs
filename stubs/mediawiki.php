<?php

// Stubs for MediaWiki core classes not available at PHPStan analysis time.
// Only methods actually called in extension src/ are declared.

namespace {

    class OutputPage
    {
        public function addHTML(string $html): void {}
        public function getTitle(): \MediaWiki\Title\Title {}
        public function getContext(): \IContextSource {}
    }

    interface IContextSource
    {
        public function getWikiPage(): \WikiPage;
    }

    class MWContent
    {
        /** @return mixed */
        public function getNativeData() {}
    }

    class WikiPage
    {
        public function getTitle(): \MediaWiki\Title\Title {}
        public function getContent(): \MWContent {}
        public function getId(): int {}
    }

    class User
    {
        public function isAllowed(string $permission): bool {}
    }

    class WebRequest
    {
        /** @return string[] */
        public function getValueNames(): array {}
    }

    class ApiResult
    {
        /** @return mixed[] */
        public function getResultData(): array {}
    }

    class ApiMain
    {
        public function __construct(\WebRequest $context) {}
        public function execute(): void {}
        public function getResult(): \ApiResult {}
    }

    class ResourceLoader extends \MediaWiki\ResourceLoader\ResourceLoader {}

    class MWException extends \Exception {}

    interface PPFrame
    {
        /** @return array<string, mixed> */
        public function getNamedArguments(): array;
    }

    class PPTemplateFrame_Hash implements PPFrame
    {
        public int $depth;

        /** @return array<string, mixed> */
        public function getNamedArguments(): array {}
    }

    class Parser
    {
        public function setHook(string $tag, callable $callback): void {}
        public function getOutput(): \ParserOutput {}
        public function recursiveTagParse(string $text, \PPFrame|false $frame = false): string {}
        public function getTitle(): \MediaWiki\Title\Title {}
        public function getRevisionId(): ?int {}
        public function makeImage(\MediaWiki\Title\Title $title, string $options = ''): string {}
    }

    class ParserOutput
    {
        public function updateCacheExpiry(int $seconds): void {}
        public function addHeadItem(string $section, string $tag = ''): void {}
        /** @param string[] $modules */
        public function addModules(array $modules): void {}
        public function addImage(string $name, mixed $timestamp = false, mixed $sha1 = false): void {}
        public function addLink(\MediaWiki\Title\Title $title, ?int $id = null): void {}
        public function addExternalLink(string $url): void {}
    }

    class ExtensionRegistry
    {
        public static function getInstance(): self {}
        public function isLoaded(string $name): bool {}
    }

    class Xml
    {
        public static function element(string $element, ?array $attribs = null, string $contents = '', bool $allowShortTag = true): string {}
    }

    class Message
    {
        public function inContentLanguage(): self {}
        public function text(): string {}
    }

    function wfMessage(string $key, mixed ...$params): \Message {}

    class RepoGroup
    {
        public function findFile(\MediaWiki\Title\Title|string $title): \File|false {}
    }

    class File
    {
        public function getMimeType(): string {}
        public function getWidth(): int {}
        public function getHeight(): int {}
        public function exists(): bool {}
    }

}

namespace MediaWiki\Title {

    class Title
    {
        public function getBaseText(): string {}
        public function inNamespace(int $ns): bool {}
        public function getPrefixedText(): string {}
        public static function newFromText(?string $text, int $defaultNamespace = 0): ?self {}
        public function getNamespace(): int {}
        public function getDBkey(): string {}
        public function getFullText(): string {}
        public function isExternal(): bool {}
        public function getPrefixedDBkey(): string {}
        public function getFragment(): string {}
        public function getFragmentForURL(): string {}
        public function getLocalURL(): string {}
        public function getPrefixedURL(): string {}
        public function getArticleID(): int {}
    }

}

namespace MediaWiki {

    class MediaWikiServices
    {
        public static function getInstance(): self {}
        public function getConnectionProvider(): \Wikimedia\Rdbms\IConnectionProvider {}
        public function getRepoGroup(): \RepoGroup {}
    }

}

namespace MediaWiki\ResourceLoader {

    class ResourceLoader
    {
        /** @param mixed[] $info */
        public function register(string $name, array $info): void {}
    }

}

namespace MediaWiki\Request {

    class FauxRequest extends \WebRequest
    {
        /** @param mixed[] $data */
        public function __construct(array $data = [], bool $wasPosted = false) {}
    }

}

namespace MediaWiki\EditPage {

    class EditPage
    {
        public function getTitle(): \MediaWiki\Title\Title {}
    }

}

namespace Wikimedia\Rdbms {

    interface IConnectionProvider
    {
        public function getReplicaDatabase(): \Wikimedia\Rdbms\IReadableDatabase;
    }

    /**
     * @extends \Iterator<int, \stdClass>
     */
    interface IResultWrapper extends \Iterator
    {
        public function current(): \stdClass;
    }

    interface IReadableDatabase
    {
        public function select(
            mixed $tables,
            mixed $fields,
            mixed $conds = '',
            string $fname = '',
            array $options = [],
            array $join_conds = []
        ): \Wikimedia\Rdbms\IResultWrapper;
    }

}

namespace Aws {

    class StreamBody
    {
        public function getContents(): string {}
    }

    class Result
    {
        public function get(string $key): \Aws\StreamBody {}
    }

}

namespace Aws\S3 {

    class S3Client
    {
        /** @param mixed[] $args */
        public function getObject(array $args): \Aws\Result {}
        /** @param mixed[] $args */
        public function putObject(array $args): \Aws\Result {}
    }

}
