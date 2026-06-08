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

    class SkinTemplate
    {
        public string $skinname;
        public string $stylename;
        public string $template;

        public function __construct(string $skinname) {}
        public function initPage(\MediaWiki\Output\OutputPage $out): void {}
        /** @param mixed $classname @param mixed $repository @param mixed $cache_dir @return mixed */
        public function setupTemplate(mixed $classname, mixed $repository = false, mixed $cache_dir = false): mixed {}
        public function getUser(): \User {}
        public function getTitle(): \MediaWiki\Title\Title {}
        public function getRelevantTitle(): \MediaWiki\Title\Title {}
        /** @return array<string, mixed> */
        public function getFooterIcons(): array {}
        /** @param array<string, mixed> $icon */
        public function makeFooterIcon(array $icon): string {}
        public function getOutput(): \MediaWiki\Output\OutputPage {}
    }

    class BaseTemplate
    {
        /** @var array<string, mixed> */
        public array $data;
        public \MediaWiki\Config\Config $config;

        public function getSkin(): \SkinTemplate {}
        public function html(string $key): void {}
        public function text(string $key): void {}
        public function msg(string $key): void {}
        public function getMsg(string $key): \Message {}
        /** @param array<string, mixed> $val */
        public function makeListItem(string $key, array $val): string {}
        /** @param array<string, mixed> $options */
        public function makeSearchInput(array $options = []): string {}
        public function makeSearchButton(string $mode, array $options = []): string {}
        /** @return array<string, mixed> */
        public function getPersonalTools(): array {}
        /** @return array<string, array<int, string>> */
        public function getFooterLinks(): array {}
        /** @return mixed */
        public function get(string $key): mixed {}
        public function getIndicators(): string {}
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
        public function isRegistered(): bool {}
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
        public function exists(): bool {}
        public function escaped(): string {}
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
        public function getPageViewLanguage(): \Language {}
    }

}

namespace {

    class Language
    {
        public function getHtmlCode(): string {}
    }

}

namespace MediaWiki {

    class MediaWikiServices
    {
        public static function getInstance(): self {}
        public function getConnectionProvider(): \Wikimedia\Rdbms\IConnectionProvider {}
        public function getRepoGroup(): \RepoGroup {}
        public function getConfigFactory(): \MediaWiki\Config\ConfigFactory {}
        public function getHookContainer(): \MediaWiki\HookContainer\HookContainer {}
        public function getWatchlistManager(): \MediaWiki\Watchlist\WatchlistManager {}
        public function getGroupPermissionsLookup(): \MediaWiki\Permissions\GroupPermissionsLookup {}
    }

}

namespace MediaWiki\Output {

    class OutputPage
    {
        public function addMeta(string $name, string $content): void {}
        /** @param string|string[] $modules */
        public function addModuleStyles(mixed $modules): void {}
        public function addModules(string ...$modules): void {}
        public function addHTML(string $html): void {}
        public function getTitle(): \MediaWiki\Title\Title {}
        public function headElement(\SkinTemplate $skin): string {}
    }

}

namespace MediaWiki\Config {

    interface Config
    {
        /** @return mixed */
        public function get(string $name): mixed;
        public function has(string $name): bool;
    }

    class ConfigFactory
    {
        public function makeConfig(string $name): \MediaWiki\Config\Config {}
    }

}

namespace MediaWiki\Html {

    class Html
    {
        /** @param array<string, mixed> $attribs */
        public static function rawElement(string $element, array $attribs = [], string $contents = ''): string {}
        /** @param array<string, mixed> $attribs */
        public static function hidden(string $name, string $value, array $attribs = []): string {}
    }

}

namespace MediaWiki\Linker {

    class Linker
    {
        public static function tooltip(string $name, ?string $options = null): string {}
        /** @param array<string, mixed> $msgParams @return array<string, string> */
        public static function tooltipAndAccesskeyAttribs(string $name, array $msgParams = [], ?string $options = null): array {}
    }

}

namespace MediaWiki\Parser {

    class Sanitizer
    {
        public static function escapeIdForAttribute(string $id, int $mode = 0): string {}
    }

}

namespace MediaWiki\Xml {

    class Xml
    {
        /** @param array<string, string>|null $attribs */
        public static function expandAttributes(?array $attribs): string {}
    }

}

namespace MediaWiki\HookContainer {

    class HookContainer
    {
        /** @param mixed[] $args */
        public function run(string $hook, array $args = []): bool {}
    }

}

namespace MediaWiki\Watchlist {

    class WatchlistManager
    {
        public function isWatched(\User $user, \MediaWiki\Title\Title $title): bool {}
    }

}

namespace MediaWiki\Permissions {

    class GroupPermissionsLookup
    {
        public function groupHasPermission(string $group, string $permission): bool {}
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
