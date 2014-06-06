class GistsController < ApplicationController
  @@list = {
    :bigocomparison => "https://gist.github.com/sandeepkunkunuru/6133274.js",
    :svnstats => "https://gist.github.com/sandeepkunkunuru/6133484.js",
    :jvmmonitoring => "https://gist.github.com/sandeepkunkunuru/4725555.js",
    :thread => "https://gist.github.com/sandeepkunkunuru/6132857.js",
    :puppet => "https://gist.github.com/sandeepkunkunuru/7270672.js",
  }
  
  def index
    @src = @@list[params["d"].to_sym]
  end
end
