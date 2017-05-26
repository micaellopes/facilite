<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Servico;
use App\Models\Especialidade;
use App\Professional;
use App\User;

class AppController extends Controller
{
	public function __construct()
	{
        // Só acessa se estiver logado
        $this->middleware('auth')->only('listarPerfis');
	}

    /**
     * Exibe home page.
     * @return view | Exibe home page do site.
     */
    public function index()
    {   
        return view('app.home');
    }

    /**
     * Exibe view com todas as categorias existentes na base
     * de dados;
     * @return view | Listando categorias existentes.
     */
    public function listarCategorias()
    {
        $categorias = Categoria::get();
        return view('app.listar-categorias', compact('categorias'));
    }

    /**
     * Lista todos os serviços cadastrados em determinada
     * categoria (a partir da URL da categoria);
     * @param  string $urlCat | URL da categoria.
     * @return view | Lista os serviços encontrados de acordo com a categoria informada.
     */
    public function listarServicos($urlCat)
    {   
        $categoria = Categoria::where('url', $urlCat)->get()->first();
        // Se for encontrada a categoria...
        if ($categoria) {
            // Lista os serviços da categoria escolhida
            $servicos = Servico::where('categoria_id', $categoria->id)->get();
            // Retorna a view com a categoria e os servicos buscados
            return view('app.listar-servicos', compact('categoria', 'servicos'));
        } else {
            // Redireciona para home caso não encontre uma $urlCat válida
            return redirect()->route('home');
        }

    }

    /**
     * Lista os profissionais cadastrados e ativos em determinada
     * categoria e respectivo serviço da mesma.
     * @param  string $urlCat | URL da categoria.
     * @param  string $urlServ | URL do serviço.
     * @return view | Lista os profissionais encontrados de acordo com a categoria e serviço informado.
     */
    public function listarProfissionais($urlCat, $urlServ)
    {
        $categoria = Categoria::where('url', $urlCat)->get()->first();
        // Se for encontrada a categoria...
        if ($categoria) {
            // Busca os serviços de acordo com a categoria buscada e a $urlServ informada
            $servico = Servico::where('categoria_id', $categoria->id)->where('url', $urlServ)->get()->first();
            // Se for encontrado o serviço...
            if ($servico) {
                // Busca as especialidades a partir do serviço encontrado
                $especialidades = Especialidade::where('servico_id', $servico->id)->get();
                // Lista profissionais a partir da categoria e serviço buscados
                $profissionais = Professional::
                      join('servico_professional', 'professionals.id', '=', 'servico_professional.professional_id')
                    ->join('servicos', 'servicos.id', '=', 'servico_professional.servico_id')
                    ->join('categoria_professional', 'professionals.id', '=', 'categoria_professional.professional_id')
                    ->join('categorias', 'categorias.id', '=', 'categoria_professional.categoria_id')
                    ->where('categorias.id', $categoria->id)->where('servicos.id', $servico->id)->where('professionals.status', 'active')->get();
            } else {
                // Caso não encontre o serviço
                return redirect()->route('home');
            }
        } else {
            // Caso não encontre a categoria
            return redirect()->route('home');
        }
        return view('app.listar-profissionais', compact('categoria', 'servico', 'especialidades', 'profissionais'));
    }

    public function filtrarEspecialidades($urlCat, $urlServ, $urlEspec)
    {
        $categoria = Categoria::where('url', $urlCat)->get()->first();
        // Se for encontrada a categoria...
        if ($categoria) {
            // Busca os serviços de acordo com a categoria buscada e a $urlServ informada
            $servico = Servico::where('categoria_id', $categoria->id)->where('url', $urlServ)->get()->first();
            // Se for encontrado o serviço...
            if ($servico) {
                // Busca as especialidades a partir do serviço encontrado (Listar nos Filtros de Especialidades)
                $especialidades = Especialidade::where('servico_id', $servico->id)->get();
                // Busca especialidade filtrada
                $filtroEspecialidade = Especialidade::where('url', $urlEspec)->get()->first();
                // Se for encontrado a especialidade filtrada...
                if ($filtroEspecialidade) {
                    // Lista profissionais a partir da categoria, serviço e especialidade buscadas
                    $profissionais = Professional::
                      join('especialidade_professional', 'professionals.id', '=', 'especialidade_professional.professional_id')
                    ->join('especialidades', 'especialidades.id', '=', 'especialidade_professional.especialidade_id')
                    ->join('servico_professional', 'professionals.id', '=', 'servico_professional.professional_id')
                    ->join('servicos', 'servicos.id', '=', 'servico_professional.servico_id')
                    ->join('categoria_professional', 'professionals.id', '=', 'categoria_professional.professional_id')
                    ->join('categorias', 'categorias.id', '=', 'categoria_professional.categoria_id')
                    ->where('categorias.id', $categoria->id)->where('servicos.id', $servico->id)->where('especialidades.id', $filtroEspecialidade->id)->where('professionals.status', 'active')->get();
                } else {
                    // Caso não encontre a especialidade filtrada
                return redirect()->route('home');
                }
                
            } else {
                // Caso não encontre o serviço
                return redirect()->route('home');
            }
        } else {
            // Caso não encontre a categoria
            return redirect()->route('home');
        }
        return view('app.listar-profissionais', compact('categoria', 'servico', 'especialidades', 'filtroEspecialidade', 'profissionais'));
    }
    
    public function buscarNome()
    {
        return "Buscar pelo nome";
    }

    /**
     * Busca e exibe o perfil profissional ativo a partir
     * do endereço do perfil.
     * @param  string $urlPerfil | URL do perfil profissional
     * @return view | Exibe o perfil profissional e suas informações.
     */
    public function listarPerfis($urlPerfil)
    {        
        $profile = Professional::where('url_perfil', $urlPerfil)->where('status', 'active')->get()->first();
        // Se for encontrada o perfil...
        if ($profile) {
            // Emille >>
            $profile->visualizacoes = $profile->visualizacoes + 1;
            $profile->save();
            return view('app.perfil-profissional', compact('profile'));
        } else {
            return redirect()->route('home');
        }
    }
}
