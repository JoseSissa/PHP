<?php

// Dependency inversion principle
// Modules high level must not depend on modules low level

interface ReportInterface
{
    public function generate(string $content);
}

// Module low level
class PDFReport implements ReportInterface
{
    public function generate(string $content)
    {
        echo "Generating PDF report... '$content' <br>";
    }
}
// Module low level
class HTMLReport implements ReportInterface
{
    public function generate(string $content)
    {
        echo "Generating HTML report... '$content' <br>";
    }
}

// Module high level
class Estimate
{
    private ReportInterface $report;

    public function __construct(ReportInterface $report)
    {
        $this->report = $report;
    }

    public function process()
    {
        echo "Processing estimate... <br>";
        $this->report->generate("Content");
    }
}

$pdfReport = new PDFReport();
$htmlReport = new HTMLReport();
$estimate = new Estimate($htmlReport);
$estimate->process();
