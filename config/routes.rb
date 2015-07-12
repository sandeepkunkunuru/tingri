Tingri::Application.routes.draw do
	root 'welcome#index'
  get 'gdocs/index'
  get 'gdocs/certifications'
  get 'sdocs/index'
  get 'gists/index'
end
