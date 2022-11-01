<?php

namespace App\Http\Livewire\Table;

use App\Models\ArticleView;
use App\Models\DownloadLink;
use App\Models\DownloadLinkPermission;
use App\Models\Email;
use App\Models\EmailReceiver;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $modelId;
    public $dataId;
    public $data;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ["deleteItem" => "delete_item", 'delete' => 'delete'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function deleteItem($id)
    {
        $this->data = $this->model::find($id);

        if (!$this->data) {
            $this->emit("deleteResult", ["status" => false, "message" => "Gagal menghapus data " . $this->name]);
            return;
        }
        $this->emit('swal:confirm', [
            'icon' => 'warning',
            'title' => 'apakah anda yakin ingin menghapus data ini',
            'confirmText' => 'Hapus',
            'method' => 'delete'
        ]);


//        $this->emit("deleteResult", ["status" => true, "message" => "Data " . $this->name . " berhasil dihapus!"]);
    }

    public function delete()
    {
        $this->data->delete();
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Berhasil menghapus data',
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();
        return view($data['view'], $data);
    }

    public function get_pagination_data()
    {
        switch ($this->name) {
            case 'mail':
                $mails = Email::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.mail', "mails" => $mails,];
                break;
            case 'receiver':
                $receiver = EmailReceiver::whereEmailId($this->dataId)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.receiver', "receivers" => $receiver,];
                break;
            case 'user':
                $users = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.user', "users" => $users,];
                break;
            case 'budget':
                $budgets = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.budget', "budgets" => $budgets,];
                break;
            case 'report':
                $reports = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.report', "reports" => $reports,];
                break;
            case 'invoice':
                $invoices = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.invoice', "invoices" => $invoices,];
                break;
            case 'content':
                $contents = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.content', "contents" => $contents,];
                break;
            case 'tag':
                $tags = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.tag', "tags" => $tags,];
                break;
            case 'campaign':
                $campaigns = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.campaign', "campaigns" => $campaigns,];
                break;
            case 'gallery':
                $gallerys = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.gallery', "gallerys" => $gallerys,];
                break;
            case 'faq':
                $faqs = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.faq', "faqs" => $faqs,];
                break;
            case 'team':
                $teams = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.team', "teams" => $teams,];
                break;
            case 'testimonial':
                $testimonials = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.testimonial', "testimonials" => $testimonials,];
                break;

            case 'partner':
                $partners = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.partner', "partners" => $partners,];
                break;
            case 'sosmed':
                $sosmeds = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.sosmed', "sosmeds" => $sosmeds,];
                break;
            case 'vendor':
                $vendors = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.vendor', "vendors" => $vendors,];
                break;
            case 'presence':
                $this->sortField = "created_at";
                $presences = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.presence', "presences" => $presences,];
                break;
            case 'salary':
                $salaries = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.salary', "salaries" => $salaries,];
                break;
            case 'link':
                $links = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.link', "links" => $links, "data" => array_to_object(['href' => ['create_new' => route('admin.link.create'), 'create_new_text' => 'Buat Data Link Shir', 'export' => '', 'export_text' => 'Export']])];
                break;
            case 'article':
                $articles = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.article', "articles" => $articles,];
                break;
            case 'article-show':
                $articles = ArticleView::whereArticleId($this->dataId)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.article-show', "articles" => $articles,];
                break;
            case 'on-news':
                $onNews = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);

                return ["view" => 'livewire.table.on-news', "onNews" => $onNews,];
                break;

            case 'proof-cash':
                $proofCash = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.proof-cash', "proofCashs" => $proofCash,];
                break;
            case 'finance':
                $finances = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.finance', "finances" => $finances,];
                break;
            case 'finance-note':
                $finances = $this->model::whereFinanceId($this->dataId)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.finance-note', "finances" => $finances,];
                break;
            case 'download-link':
                $downloadLink = DownloadLink::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.download-link', "downloadLinks" => $downloadLink,];
                break;
            case 'download-link-permission':
                $downloadLink = DownloadLinkPermission::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.download-link-permission', "downloadLinks" => $downloadLink,];
                break;

            case 'collaboration-file':
                $collaborationFiles = $this->model::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage);
                return ["view" => 'livewire.table.collaboration', "collaborationFiles" => $collaborationFiles,];
                break;
            default:
                # code...
                break;
        }
    }
}
