@extends('layouts.app')

@section('title', 'Termos e condições')

@section('content')
    <section id="about" class="bg-white text-black p-8 px-16 mx-auto">
        <div class="mt-6 flex flex-col lg:flex-row lg:justify-between gap-12">
            <div class="space-y-2">
                <h2 class="text-2xl uppercase tracking-wide">{{ __('pages.terms_and_conditions.title') }}</h2>
                <p class="text-base font-light tracking-wide">O uso do website Unidrive (a partir de agora denominado Site) oferecido pela Unidrive está condicionado à aceitação e ao cumprimento do "Termos e Condições de Uso" descrito abaixo:</p>

                <ol class="list-decimal space-y-2 text-base font-light ">
                    <li>O uso do Site e de todas as informações, telas, exibições e produtos, incluindo os mecanismos de busca, bem como todos os serviços oferecidos, estão sujeitos às condições constantes deste termo;</li>
                    <li>Estas condições poderão ser alteradas sem necessidade de aviso prévio específico. As alterações constarão sempre deste termo, que deverá ser revisado sempre pelos usuários;</li>
                    <li>O respectivo Termos de Uso tem como objetivo regrar a utilização pelos usuários de Internet (doravante "Usuário") do site Unidrive, encontrado no endereço eletrônico http://www.unidrive.com/;</li>
                    <li>Para poder utilizar livremente dos conteúdos e serviços oferecidos pelo Site, o Usuário deverá ler atentamente e concordar expressamente com o conteúdo aqui disposto;</li>
                    <li>Determinados Serviços do Site estão submetidos à regulamentação específica (doravante "Termo Específico") que, dependendo da hipótese, poderá substituir, completar e/ou alterar o presente instrumento;</li>
                    <li>O Site se reserva o direito de modificar, suprimir e/ou ampliar, livremente e a qualquer tempo, sem comunicação prévia, o presente Termo de Uso;</li>
                    <li>O Site oferece seus Serviços aos Usuários de forma gratuita, salvo em alguns Serviços oferecidos pelo mesmo e/ou por terceiros, que poderão ser cobrados em conformidade com o disposto nos Termos Específicos;</li>
                    <li>Inicialmente, para a utilização dos Serviços fornecidos por meio do Site não se requer a inscrição e/ou registro do Usuário (considerados "Serviços Abertos"). Porém, o Site também pode vir a oferecer alguns Serviços onde se requer ao Usuário, a condição de inscrição e/ou registro para o seu uso (considerados "Serviços Fechados");</li>
                    <li>
                        O Usuário, por este termo, concorda e se compromete a utilizar os Serviços corretamente, somente para os fins permitidos, em conformidade com o disposto neste Termo de Uso, nos Termos Específicos de determinados Serviços, nos demais avisos e instruções elaborados, na legislação em vigor e com a moral e bons costumes, assim como concorda e se compromete a qualquer título:
                        <ul class="pl-5 mt-2 list-disc list-inside space-y-2 text-base font-light">
                            <li>não acessar, nem sequer tentar acessar, a qualquer Serviço ou ambiente por qualquer meio que não seja por meio da interface disponibilizada pelo Site, inclusive por meios automatizados, salvo especialmente autorizado por força de contrato assinado;</li>
                            <li>não participar de nenhum processo ou atividade que interfira ou interrompa o funcionamento dos Serviços, Servidores e ainda de redes conectadas aos Serviços do Site;</li>
                            <li>não reproduzir, duplicar, copiar, vender, comercializar ou revender os Serviços do Site a qualquer título, salvo especialmente autorizado por força de contrato assinado com a empresa.</li>
                        </ul>
                    </li>
                    <li>O Usuário concorda que é o único responsável por qualquer incumprimento de seus compromissos e suas obrigações no que diz respeito aos Termos e por todo exposto acima, reconhecendo que o Site não tem qualquer responsabilidade perante a ele ou terceiros, respondendo o Usuário por todas as consequências, tais como perda, dano ou prejuízo que o Site e/ou terceiro possa vir sofrer, resultantes do não cumprimento;</li>
                    <li>O Usuário concorda expressamente que a utilização e/ou acesso aos Serviços do Site é por sua integra e total conta e risco, compreendendo que os Serviços são disponibilizados na forma que se encontram e de acordo com a disponibilidade, sendo que o Site não garante que o uso dos Serviços atenderá aos requisitos do Usuário.</li>
                    <li>O Site se exime de toda e qualquer responsabilidade por eventuais perdas, danos e prejuízos de qualquer natureza decorrentes da falta de disponibilidade e continuidade do funcionamento de seus Serviços, bem como a utilidade que os Usuários possam ter atribuído aos seus Serviços e a sua falibilidade.</li>
                    <li>O presente Site não controla as Páginas Externas, logo não garante, assim como não assume qualquer tipo de responsabilidade, por eventuais perdas, danos e prejuízos de qualquer natureza decorrentes: (i) do funcionamento, disponibilidade, acessibilidade ou continuidade destas páginas; (ii) da manutenção dos serviços, informação, dados, arquivos, produtos e qualquer tipo de material existente nas páginas externas; (iii) da prestação ou transmissão dos serviços, informação, dados, arquivos, produtos e qualquer tipo de material existente nos sites linkados; (iv) da qualidade, legalidade, confiabilidade e utilidade dos Serviços, informação, dados, arquivos, produtos e qualquer tipo de material existente nas Páginas Externas.</li>
                    <li>O presente Termos de Uso é regido única e exclusivamente pelas leis da República Federativa do Brasil e qualquer discussão judicial que surja tendo por base sua interpretação ou aplicação deverá ser julgado por tribunais brasileiros..'</li>
                </ol>
            </div>
        </div>
    </section>
@endsection
