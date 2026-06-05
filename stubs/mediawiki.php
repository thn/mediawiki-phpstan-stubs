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

    class ResourceLoader
    {
        /** @param mixed[] $info */
        public function register(string $name, array $info): void {}
    }

    class Parser
    {
        public function setHook(string $tag, callable $callback): void {}
        public function getOutput(): \ParserOutput {}
    }

    class ParserOutput
    {
        public function updateCacheExpiry(int $seconds): void {}
    }

}

namespace MediaWiki\Title {

    class Title
    {
        public function getBaseText(): string {}
        public function inNamespace(int $ns): bool {}
        public function getPrefixedText(): string {}
    }

}

namespace MediaWiki {

    class MediaWikiServices
    {
        public static function getInstance(): self {}
        public function getConnectionProvider(): \Wikimedia\Rdbms\IConnectionProvider {}
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
